<?php

namespace App\Http\Controllers;

use App\Models\BlogComments;
use App\Http\Requests\StoreBlogCommentsRequest;
use App\Http\Requests\UpdateBlogCommentsRequest;

class BlogCommentsController extends Controller
{
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
    public function store(StoreBlogCommentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogComments $blogComments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogComments $blogComments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogCommentsRequest $request, BlogComments $blogComments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogComments $blogComments)
    {
        //
    }
}
