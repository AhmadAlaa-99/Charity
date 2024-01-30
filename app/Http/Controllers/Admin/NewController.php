<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news_private = News::where('is_publish','0')->paginate('5');
        $news_public = News::where('is_publish','1')->paginate('5');
        return view('Dashboard.News.index', compact('news_private', 'news_public'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.News.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'brive_new' => 'required|string',
            'whole_new' => 'required|string',
            'date' => 'required|date',
            'image' => 'required|image',
            'is_publish' => 'required|boolean',
            'main' => 'required|boolean',
        ]);
        try {
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public/news');
                $imageUrl = Storage::url($path);
            }
            $news = new News();
            $news->title = $validatedData['title'];
            $news->brive_new = $validatedData['brive_new'];
            $news->whole_new = $validatedData['whole_new'];
            $news->date = $validatedData['date'];
            $news->image =  $imageUrl ?? '';
            $news->is_publish = $validatedData['is_publish'];
            $news->main = $validatedData['main'];
            $news->save();

            // Redirect based on the action
            return $request->input('action') == 'more_add'
                ? redirect()->route('admin.news.create')->with('success', 'تمت العملية بنجاح.')
                : redirect()->route('admin.news.index')->with('success', 'تمت العملية بنجاح.');
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
        $new = News::where('id', $id)->first();
        return view('Dashboard.News.edit', compact('new'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'brive_new' => 'required|string',
            'whole_new' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image', // ملف الصورة اختياري في التحديث
            'is_publish' => 'required|boolean',
            'main' => 'required|boolean',
        ]);
        try {
            $news = News::findOrFail($id);
            if ($request->hasFile('image')) {
                if ($news->image) {
                    Storage::delete($news->image);
                }
                $path = $request->file('image')->store('public/news');
                $news->image = Storage::url($path);
            }
            $news->title = $validatedData['title'];
            $news->brive_new = $validatedData['brive_new'];
            $news->whole_new = $validatedData['whole_new'];
            $news->date = $validatedData['date'];
            $news->is_publish = $validatedData['is_publish'];
            $news->main = $validatedData['main'];
            $news->save();
            return redirect()->route('admin.news.index')->with('success', 'تمت العملية بنجاح');
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
            $new = News::findOrFail($id);
            $new->delete();
            return redirect()->route('admin.news.index')->with('success', 'تمت العملية بنجاح');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
