<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // Fetch the authenticated user
        return view('profile.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the input data
        $data = $request->validate([
            'description' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Handle the profile image if present
        if ($request->hasFile('profile_image')) {
            // Store the file and get its path
            $filePath = $request->file('profile_image')->store('profile_images', 'public');

            // Delete the old image if it exists
            if ($user->profile->profile_image) {
                Storage::disk('public')->delete($user->profile->profile_image);
            }

            // Update the profile image path
            $data['profile_image'] = $filePath;
        }

        // Handle the URL field (even if empty)
        if ($request->has('url')) {
            $data['url'] = $request->input('url');
        }

        // Update the profile with the new data
        $user->profile->update($data);

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');

    }


}
