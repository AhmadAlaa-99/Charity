<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Council;

class CouncilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $councils = Council::paginate('5');
        return view('Dashboard.Councils.index', compact('councils'));
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
            'name' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|url'
        ]);
        try {
            if ($request->hasFile('logo')) {
                $path = $request->file('logo')->store('public/partners');
                $imageUrl = Storage::url($path);
            }
            Council::create([
                'name' => $request->name,
                'logo' => $imageUrl ?? '',
                'link' => $request->link
            ]);
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
            'name' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|url'
        ]);

        try {
            $partner = Council::findOrFail($id);
            if ($request->hasFile('logo')) {
                if ($partner->logo) {
                    Storage::delete($partner->logo);
                }
                $path = $request->file('logo')->store('public/partners');
                $partner->logo = Storage::url($path);
            }
            $partner->update([
                'name' => $request->name,
                'link' => $request->link
            ]);
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
            $partner = Council::findOrFail($id);

            // Delete image
            if ($partner->logo) {
                Storage::delete($partner->logo);
            }

            $partner->delete();

            return redirect()->back()->with('success', 'تمت العملية بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }
}
