<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// models
use App\Models\Post;
use App\Models\Type;
use App\Models\Technology;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

        /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.posts.create',compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationResult = $request->validate([
            'title' => 'required|max:64',
            'slug' => 'nullable|max:1000',
            'content' => 'nullable|max:1000',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array|exists:technologies,id'
        ]);

        $post = Post::create($validationResult);
        // dd($validationResult);

        // if (isset($postData['technologies'])) {
        //     foreach ($postData['technologies'] as $singletechnologyId) {
        //         /*
        //             post_id     |   tag_id
        //             ----------------------
        //             $post->id   |  $singleTagId
        //         */
        //         $post->technologies()->attach($singletechnologyId);
        //     }
        // }

        return redirect()->route('admin.posts.show', ['post' => $post->slug]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $types = Type::all();
        $technologies = Technology::all();
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('admin.posts.edit',compact('post','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $validationResult = $request->validate([
            'title' => 'required|max:64',
            'slug' => 'nullable|max:1000',
            'content' => 'nullable|max:1000',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array|exists:technologies,id'

        ]);

        $post->update($validationResult);
        // dd($validationResult);
        return redirect()->route('admin.posts.index');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
