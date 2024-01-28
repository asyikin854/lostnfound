<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'adminID' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['adminID' => $credentials['adminID'], 'password' => $credentials['password']])) {

            session(['admin_location' => Auth::user()->admin_location]);

            return redirect()->intended('/image/index');
        }
        return back()->withErrors(['login' => 'Invalid credentials']);
    }
    public function login()
    {
        return view('image.admin');
    }
    public function adminDisplay(Request $request)
    {
        $adminLocation = session('admin_location');
        
        $images = Image::where('location', $adminLocation);

        if ($request->has('search')) {
            $searchQuery = $request->query('search');
            $images->where('itemName', 'like', '%'.$searchQuery.'%');
        }
        $filteredImages = $images->get();

        return view('/image/index', ['images' => $filteredImages]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/image/admin'); // Redirect to the login page
    }
    public function deleteItem($id)
    {
    $image = Image::find($id);

    if ($image) {
        // Delete the image
        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    return redirect()->back()->with('error', 'Image not found.');
    }
}
