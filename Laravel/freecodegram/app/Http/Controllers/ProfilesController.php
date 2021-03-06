<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
    	// dd($user);
    	// $user = User::findOrFail($user);

        return view('profiles.index', compact('user'));
    }

    public function edit(User $user) 
    {
    	// dd(compact('user')->profile);
        $this->authorize('update', $user->profile);

    	return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

    	$data = request()->validate([
    		'title' => 'required|string|max:255',
    		'description' => 'required|string|max:255',
    		'url' => 'url',
    		'image' => 'required|image',
    	]);

        if (request('image')) {
            // store image into the path '/storage/app/public/uploads/'
            $imagePath = request('image')->store('profile', 'public');

            // resize image
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
        }

    	auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imagePath]
        ));
        // dd($user);
        return redirect("/profile/{$user->id}");
    }
}
