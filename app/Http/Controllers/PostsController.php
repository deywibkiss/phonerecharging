<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PostsController extends Controller
{
	use WithoutMiddleware;

    // Create a new post
    public function create(Request $request){

    	$this->validate($request, [
    		'name' => 'required|string',
    		'topic' => 'required|string'
    	]);

    	$post = new Post;
    	$post->name = $request->input('name');
    	$post->topic = $request->input('topic');

    	$post->save();

    	return response()->success(compact('post'));
    }
}
