<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $database;

    public function __construct()
    {
        $this->database = app('firebase.database');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->database->getReference('posts')->getValue() ?? [];
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $this->database->getReference('posts')->push([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = $this->database->getReference('posts/' . $id)->getValue();
        return view('posts.show', compact('post', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = $this->database->getReference('posts/' . $id)->getValue();
        return view('posts.edit', compact('post', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $this->database->getReference('posts/' . $id)->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->database->getReference('posts/' . $id)->remove();
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
