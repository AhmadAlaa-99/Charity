<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide as Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders_private = Slider::where('is_publish', '0')->paginate('5');
        $sliders_public = Slider::where('is_publish', '1')->paginate('5');
        return view('Dashboard.Sliders.index', compact('sliders_private', 'sliders_public'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sub_title' => 'required|string',
            'main_title' => 'required|string',
            'details' => 'required|string',
            'image' => 'required|image',
            'is_publish' => 'required|boolean',
        ]);
        try {
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public/sliders');
                $imageUrl = Storage::url($path);
            }
            $slider = new Slider();
            $slider->sub_title = $validatedData['sub_title'];
            $slider->main_title = $validatedData['main_title'];
            $slider->image =  $imageUrl ?? '';
            $slider->is_publish = $validatedData['is_publish'];
            $slider->details = $validatedData['details'];
            $slider->save();

            // Redirect based on the action
            return $request->input('action') == 'more_add'
                ? redirect()->route('admin.sliders.create')->with('success', 'تمت العملية بنجاح.')
                : redirect()->route('admin.sliders.index')->with('success', 'تمت العملية بنجاح.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
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
        $slider = Slider::where('id', $id)->first();
        return view('Dashboard.Sliders.edit', compact('slider'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sub_title' => 'required|string',
            'main_title' => 'required|string',
            'details' => 'required|string',
            'image' => 'nullable|image', // ملف الصورة اختياري في التحديث
            'is_publish' => 'required|boolean',

        ]);
        try {
            $slider = Slider::findOrFail($id);
            if ($request->hasFile('image')) {
                if ($slider->image) {
                    Storage::delete($slider->image);
                }
                $path = $request->file('image')->store('public/sliders');
                $slider->image = Storage::url($path);
            }
            $slider->sub_title = $validatedData['sub_title'];
            $slider->main_title = $validatedData['main_title'];

            $slider->is_publish = $validatedData['is_publish'];
            $slider->details = $validatedData['details'];
            $slider->save();
            return redirect()->route('admin.sliders.index')->with('success', 'تمت العملية بنجاح');
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
            $slider = Slider::findOrFail($id);
            $slider->delete();
            return redirect()->route('admin.sliders.index')->with('success', 'تمت العملية بنجاح');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
