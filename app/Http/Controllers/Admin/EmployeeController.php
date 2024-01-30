<?php

namespace App\Http\Controllers\Admin;


use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nationality;
use App\Models\Section;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees=Employee::with('section','nationality')->paginate('5');
        $sections=Section::get();
        $nationalities =Nationality::get();
        return view('Dashboard.Users.employees', compact('employees','sections','nationalities'));
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
            'qualification' => 'required|string|max:255',
            'date' => 'required',
            'wage' => 'required',
            'grant' => 'required',
            'notes' => 'required',
        ]);
        try {

            Employee::create($request->all());
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
            'qualification' => 'required|string|max:255',
            'date' => 'required',
            'wage' => 'required',
            'grant' => 'required',
            'notes' => 'required',
        ]);

        try {
            $employee = Employee::findOrFail($id);
            $employee->update($request->all());
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
            $employee = Employee::findOrFail($id);
            $employee->delete();
            return redirect()->back()->with('success', 'تمت العملية بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }
}
