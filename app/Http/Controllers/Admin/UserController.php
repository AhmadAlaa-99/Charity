<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::where('name','!=','admin')->get();
        $users = User::paginate('5');
        return view('Dashboard.Users.users', compact('users','roles'));
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
             'email' => 'required|email|unique:users,email',
             'password' => 'required|string|min:6|confirmed',
             'password_confirmation' => 'required_with:password|same:password|min:6'
         ]);

         try {
             User::create([
                 'name' => $request->name,
                 'email' => $request->email,
                 'password' => Hash::make($request->password), // يتم تشفير كلمة المرور
                 'roleName'=>$request->roleName,
             ]);
             return redirect()->back()->with('modalOpen', 'add');
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
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6|confirmed',
            'password_confirmation' => 'nullable|required_with:password|same:password|min:6'
        ]);
        try {
            $user = User::findOrFail($id);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($request->password) {
                $user->password = Hash::make($request->password);
                $user->save();
            }
            return redirect()->back()->with('modalOpen', 'edit');
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
            $partner = User::findOrFail($id);

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
