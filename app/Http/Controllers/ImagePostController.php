<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImagePost;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ImagePostController extends Controller
{ public function create()
    {
        return view('image_posts.create');
    }

    // Store the new image post
    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ]);

        // Store the image
        $imagePath = $request->file('image')->store('image_posts', 'public');

        // Create the new image post in the database
        ImagePost::create([
            'user_id' => Auth::id(),
            'image' => $imagePath,
            'caption' => $data['caption'] ?? null,
        ]);

        return redirect()->route('dashboard')->with('success', 'Image posted successfully!');
    }

    // Show the user's image posts on their profile
    
    //
}
