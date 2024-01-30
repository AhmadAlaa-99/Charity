<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::paginate('5');
        return view('Dashboard.Videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validateWithBag('add', [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'link' => 'required',
            'is_publication' => 'required',
            'notes' => 'required',
        ]);
        try {
            Video::create($request->all());
            return redirect()->back()->with('modalOpen', true);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $request->session()->flash('add_error', true);
            return redirect()->back()->withErrors($e->validator, 'add')->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validateWithBag('edit', [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'link' => 'required',
            'is_publication' => 'required',
            'notes' => 'required',
        ]);
        try {
            $contact = Video::findOrFail($id);
            $contact->update($request->all());
            return redirect()->back()->with('modalOpen', true);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $request->session()->flash('edit_error', true);
            $request->session()->flash('edit_id', $id);
            return redirect()->back()->withErrors($e->validator, 'edit')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $video = Video::findOrFail($id);
            $video->delete();
            return redirect()->back()->with('success', 'تمت العملية بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }
}
