<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

	public function __construct() 
	{
		$this->middleware('auth'); // check login status
	}

    public function create() {
    	return view('posts.create');
    }

    public function store() {
    	$data = request()->validate([
    		'caption' => 'required',
    		'image' => ['required', 'image'],
    	]);

    	// store image into the path '/storage/app/public/uploads/'
    	$imagePath = request('image')->store('uploads', 'public');

        // resize image
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

    	// if user authonticated
    	auth()->user()->posts()->create([
    		'caption' => $data['caption'],
    		'image' => $imagePath,
    	]);

    	return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post) 
    {
        // $post = Post::findOrFail($post);

        /*
            compact is like this: ['result' => $result]
        */
        return view('posts.show', compact('post'));
    }
}
