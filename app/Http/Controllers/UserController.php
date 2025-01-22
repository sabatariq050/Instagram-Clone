<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // Fetch the authenticated user
        return view('profile.edit', compact('user'));
    }

    public function searchUsers(Request $request)
    {
        $search = $request->get('search');
    
        // Find users matching the search term
        $users = User::where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->get(['id', 'name', 'email','username']); // Only fetch required fields
    
        return response()->json($users);
    }
   
    public function show_profile($user)
    {
        $user = User::findOrFail($user); // Fetch the user by ID
        $posts = $user->imagePosts()->latest()->get();
        $totalPostCount = $posts->count();
        return view('view', compact('user', 'posts','totalPostCount'));
    }

}
