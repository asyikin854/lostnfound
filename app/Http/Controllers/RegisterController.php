<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register ()
    {
        return view('register');
    }
    public function registers(Request $request)
    {
        // Validate registration data
        $validatedData = $request->validate([
            'adminID' => 'required|unique:users', // Assuming adminID is unique in the users table
            'password' => 'required',
            'admin_location' => 'required',
        ]);

        // Create new user
        $user = User::create([
            'adminID' => $validatedData['adminID'],
            'password' => bcrypt($validatedData['password']), // Hash the password
            'admin_location' => $validatedData['admin_location'],
        ]);

        return redirect()->intended('/image/admin');
    }
}