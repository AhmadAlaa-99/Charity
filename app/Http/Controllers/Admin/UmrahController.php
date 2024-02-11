<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide as Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\umrah;
use App\Models\muamtari;


class UmrahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $umrah_soon = umrah::where('status','قريبا')->paginate('5');
        $umrah_done = umrah::where('status','مغلقة')->paginate('5');
        $umrah_open = umrah::where('status', 'متاحة')->paginate('5');
        $umrah_executed = umrah::where('status', 'منفذة')->paginate('5');
        return view('Dashboard.Umrah.index', compact('umrah_soon', 'umrah_done', 'umrah_open', 'umrah_executed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Umrah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'sub_title' => 'required|string',
        ]);
        try {
            umrah::create($request->all());

            // $slider = new Slider();
            //$umrah->sub_title = $validatedData['sub_title'];
            //$umrah->main_title = $validatedData['main_title'];
            //$umrah->image =  $imageUrl ?? '';
            //$umrah->is_publish = $validatedData['is_publish'];
            //$umrah->details = $validatedData['details'];
            //$umrah->save();

            // Redirect based on the action
            return $request->input('action') == 'more_add'
                ? redirect()->route('admin.umrahs.create')->with('success', 'تمت العملية بنجاح.')
                : redirect()->route('admin.umrahs.index')->with('success', 'تمت العملية بنجاح.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = muamtari::where('umrah_id',$id)->paginate('6');
        return view('Dashboard.Umrah.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $umrah = umrah::where('id', $id)->first();
        return view('Dashboard.Umrah.edit', compact('umrah'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'company' => 'required',
            'n_days' => 'nullable',
            'location' => 'required',
            'move_on' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);
        try {
            $umrah = umrah::findOrFail($id);

            $umrah->name = $validatedData['name'];
            $umrah->type = $validatedData['type'];
            $umrah->company = $validatedData['company'];
            $umrah->n_days = $validatedData['n_days'];

            $umrah->location = $validatedData['location'];
            $umrah->move_on = $validatedData['move_on'];
            $umrah->start_date = $validatedData['start_date'];
            $umrah->end_date = $validatedData['end_date'];
            $umrah->status = $validatedData['status'];
            $umrah->save();
            return redirect()->route('admin.umrahs.index')->with('success', 'تمت العملية بنجاح');
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
            $umrah = umrah::findOrFail($id);
            $umrah->delete();
            return redirect()->route('admin.umrahs.index')->with('success', 'تمت العملية بنجاح');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
