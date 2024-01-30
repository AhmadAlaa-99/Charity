<?php

namespace App\Http\Controllers\Admin;


use App\Models\Governance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GovernanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $governances = Governance::paginate('5');
        return view('Dashboard.Governances.index', compact('governances'));
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
            'name' => 'required|string|max:255',
            'date' => 'required',
            'documention' => 'required',
            'note' => 'required',
            'cost' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public/governances');
                $imageUrl = Storage::url($path);
            }
            if ($request->hasFile('documention')) {
                $path = $request->file('documention')->store('public/documentions_go');
                $documentionUrl = Storage::url($path);
            }
            Governance::create([
                'name' => $request->name,
                'image' => $imageUrl ?? '',
                'documention' => $documentionUrl ?? '',
                'cost' => $request->cost,
                'note' => $request->note,
                'date' => $request->date,
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
            'name' => 'required|string|max:255',
            'date' => 'required',
            'documention' => 'required',
            'note' => 'required',
            'cost' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $governance = Governance::findOrFail($id);
            if ($request->hasFile('image')) {
                if ($governance->image) {
                    Storage::delete($governance->image);
                }
                $path = $request->file('image')->store('public/governances');
                $governance->image = Storage::url($path);
            }
            if ($request->hasFile('documention')) {
                if ($governance->documention) {
                    Storage::delete($governance->documention);
                }
                $path = $request->file('documention')->store('public/governances');
                $governance->documention = Storage::url($path);
            }

            $governance->update([
                'name' => $request->name,
                'cost' => $request->cost,
                'note' => $request->note,
                'date' => $request->date,
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
            $governance = Governance::findOrFail($id);

            // Delete image
            if ($governance->documention) {
                Storage::delete($governance->documention);
            }
            if ($governance->documention) {
                Storage::delete($governance->documention);
            }

            $governance->delete();

            return redirect()->back()->with('success', 'تمت العملية بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }
}
