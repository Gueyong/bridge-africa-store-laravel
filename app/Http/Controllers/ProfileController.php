<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('profile.show');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        auth()->user()->update($request->only('name', 'email'));

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }

    public function changePassword()
    {
        return view('profile.change-password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = auth()->user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
    
        $user->update(['password' => Hash::make($request->password)]);
    
        return redirect()->route('profile.show')->with('success', 'Password changed successfully!');
    }
    
}