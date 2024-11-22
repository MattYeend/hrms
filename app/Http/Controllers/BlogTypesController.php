<?php

namespace App\Http\Controllers;

use App\Models\BlogTypes;
use App\Models\Logger;
use App\Http\Requests\StoreBlogTypesRequest;
use App\Http\Requests\UpdateBlogTypesRequest;

class BlogTypesController extends Controller
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
    public function store(StoreBlogTypesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogTypes $blogTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogTypes $blogTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogTypesRequest $request, BlogTypes $blogTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogTypes $blogTypes)
    {
        //
    }
}
