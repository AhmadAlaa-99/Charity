<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function statistics()
    {
        return view('Dashboard.statistics');
    }
    public function profile()
    {
        $user = Auth::user();

        return view('Dashboard.profile', compact('user'));
    }
    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'confirmed',
        ]);
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']); // Remove password from $validatedData if not provided
        }
        $user->update($validatedData);
        return view('Dashboard.profile', compact('user'));
    }
    public function charity_profile()
    {
        $charity = About::first();
        return view('Dashboard.charity_profile', compact('charity'));
    }
    public function update_charity_profile(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'nullable|email',
            'description' => 'nullable',
            'vision' => 'nullable',
            'message' => 'nullable',
            'value' => 'nullable',
            'objectives' => 'nullable',
            'logo' => 'nullable|image|mimes:png', //dimensions:min_width=100,min_height=100,max_width=500,max_height=500
        ]);
        $charity = About::first();
        $charity->update($validatedData);
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('charity_profile');
            $imageUrl = Storage::url($path);
            $charity->logo = $imageUrl;
        }
        return redirect()->back();
    }
}
