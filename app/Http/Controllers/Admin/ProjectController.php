<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects_private = Project::where('is_publish', '0')->paginate('5');
        $projects_public = Project::where('is_publish', '1')->paginate('5');
        return view('Dashboard.Projects.index', compact('projects_private', 'projects_public'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Projects.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'cost' => 'required',
            'suppport_party' => 'required',
            'objective' => 'required',
            'image' => 'required|image',
            'is_publish' => 'required|boolean',
            'documention' => 'required',
            'date' => 'required|date',
            'note' => 'required',
        ]);
        try {
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public/projects');
                $imageUrl = Storage::url($path);
            }
            if ($request->hasFile('documention')) {
                $path = $request->file('documention')->store('public/documentions_pro');
                $documentionUrl = Storage::url($path);
            }
            $project = new Project();
            $project->name = $validatedData['name'];
            $project->description = $validatedData['description'];
            $project->category = $validatedData['category'];
            $project->cost = $validatedData['cost'];
            $project->image =  $imageUrl ?? '';
            $project->documention =  $documentionUrl ?? '';
            $project->is_publish = $validatedData['is_publish'];
            $project->suppport_party = $validatedData['suppport_party'];
            $project->objective = $validatedData['objective'];
            $project->date = $validatedData['date'];
            $project->note = $validatedData['note'];
            $project->save();
            // Redirect based on the action
            return $request->input('action') == 'more_add'
                ? redirect()->route('admin.projects.create')->with('success', 'تمت العملية بنجاح.')
                : redirect()->route('admin.projects.index')->with('success', 'تمت العملية بنجاح.');
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
        $project = Project::where('id', $id)->first();
        return view('Dashboard.Projects.edit', compact('project'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'cost' => 'required',
            'suppport_party' => 'required',
            'objective' => 'required',
            'image' => 'nullable|image',
            'is_publish' => 'required|boolean',
            'documention' => 'nullable|file',
            'date' => 'required|date',
            'note' => 'required',
        ]);
        try {
            $project = Project::findOrFail($id);
            if ($request->hasFile('image')) {
                if ($project->image) {
                    Storage::delete($project->image);
                }
                $path = $request->file('image')->store('public/projects');
                $project->image = Storage::url($path);
            }
            if ($request->hasFile('documention')) {
                if ($project->image) {
                    Storage::delete($project->documention);
                }
                $path = $request->file('documention')->store('public/documentions_pro');
                $project->image = Storage::url($path);
            }
            $project->name = $validatedData['name'];
            $project->description = $validatedData['description'];
            $project->category = $validatedData['category'];
            $project->cost = $validatedData['cost'];
            $project->image =  $imageUrl ?? '';
            $project->documention =  $documentionUrl ?? '';
            $project->is_publish = $validatedData['is_publish'];
            $project->suppport_party = $validatedData['suppport_party'];
            $project->objective = $validatedData['objective'];
            $project->date = $validatedData['date'];
            $project->note = $validatedData['note'];
            $project->save();
            return redirect()->route('admin.projects.index')->with('success', 'تم تحديث المشروع بنجاح.');
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
            $project = Project::findOrFail($id);
            $project->delete();
            return redirect()->route('admin.projects.index')->with('success', 'تم حذف المشروع بنجاح.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
    public function downloadDocument($id)
    {
        $project = Project::findOrFail($id);
        $documentionName = basename($project->documention);

        $filePath = 'public/documentions_pro/' . $documentionName;
        if (!Storage::exists($filePath)) {
            return redirect()->back()->with('error', 'File not found.');
        }
        $absolutePath = Storage::path($filePath);
        $headers = ['Content-Type' => Storage::mimeType($filePath)];
        return response()->download($absolutePath, $documentionName, $headers);
    }
}
