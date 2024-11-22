<?php

namespace App\Http\Controllers;

use App\Models\BlogCategories;
use App\Models\Logger;
use App\Http\Requests\StoreBlogCategoriesRequest;
use App\Http\Requests\UpdateBlogCategoriesRequest;

class BlogCategoriesController extends Controller
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
    public function store(StoreBlogCategoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategories $blogCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategories $blogCategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogCategoriesRequest $request, BlogCategories $blogCategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategories $blogCategories)
    {
        //
    }
}
