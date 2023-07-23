<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function index() 
    {
        return view('admin.profile.index');    
    }

    function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required' , 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,'.Auth::user()->id],
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back();
    }
}
