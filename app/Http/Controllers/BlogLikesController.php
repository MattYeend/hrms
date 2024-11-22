<?php

namespace App\Http\Controllers;

use App\Models\BlogLikes;
use App\Models\Logger;
use App\Http\Requests\StoreBlogLikesRequest;
use App\Http\Requests\UpdateBlogLikesRequest;

class BlogLikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogLikesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogLikes $blogLikes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogLikes $blogLikes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogLikesRequest $request, BlogLikes $blogLikes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogLikes $blogLikes)
    {
        //
    }
}
