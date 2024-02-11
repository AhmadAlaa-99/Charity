<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events_private = Event::where('is_publish','0')->paginate('5');
        $events_public = Event::where('is_publish','1')->paginate('5');
        return view('Dashboard.Events.index', compact('events_private', 'events_public'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Dashboard.Events.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'location' => 'required|string',
            'date' => 'required|date',
            'image' => 'required|image',
            'is_publish' => 'required|boolean',
            'brive' => 'required|string',
            'notes' => 'nullable|string',

        ]);
        try {
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public/events');
                $imageUrl = Storage::url($path);
            }
            $event = new Event();
            $event->name = $validatedData['name'];
            $event->type = $validatedData['type'];
            $event->location = $validatedData['location'];
            $event->date = $validatedData['date'];
            $event->image =  $imageUrl ?? '';
            $event->is_publish = $validatedData['is_publish'];
            $event->brive = $validatedData['brive'];
            $event->notes = $validatedData['notes'];
            $event->save();

            // Redirect based on the action
            return $request->input('action') == 'more_add'
                ? redirect()->route('admin.events.create')->with('success', 'تمت العملية بنجاح.')
                : redirect()->route('admin.events.index')->with('success', 'تمت العملية بنجاح.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::where('id', $id)->first();
        return view('Dashboard.Events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::where('id', $id)->first();
        return view('Dashboard.Events.edit', compact('event'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'location' => 'required|string',
            'date' => 'required|date',
            'image' => 'required|image',
            'is_publish' => 'required|boolean',
            'brive' => 'required|string',
            'notes' => 'nullable|string',
        ]);
        try {
            $event = Event::findOrFail($id);
            if ($request->hasFile('image')) {
                if ($event->image) {
                    Storage::delete($event->image);
                }
                $path = $request->file('image')->store('public/events');
                $event->image = Storage::url($path);
            }
            $event->name = $validatedData['name'];
            $event->type = $validatedData['type'];
            $event->location = $validatedData['location'];
            $event->date = $validatedData['date'];
            $event->image =  $imageUrl ?? '';
            $event->is_publish = $validatedData['is_publish'];
            $event->brive = $validatedData['brive'];
            $event->notes = $validatedData['notes'];
            $event->save();
            return redirect()->route('admin.events.index')->with('success', 'تم تحديث الفعالية بنجاح.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->delete();
            return redirect()->route('admin.events.index')->with('success', 'تمت العملية بنجاح.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
