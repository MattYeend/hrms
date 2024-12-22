<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Logger;
use App\Http\Requests\StoreBlogsRequest;
use App\Http\Requests\UpdateBlogsRequest;

class BlogsController extends Controller
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
        $blogs = Blogs::with(['author', 'approvedBy'])->latest()->paginate(10);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Display a list view for published blogs.
     */
    public function listView()
    {
        $blogs = Blogs::where('status', 'published')
                    ->where('approval_status', 'approved')
                    ->latest()
                    ->get();
        return view('blogs.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogsRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = Auth::id();
        $validated['status'] = 'draft';
        $validated['approval_status'] = 'pending';

        Blogs::create($validated);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $blogs)
    {
        return view('blogs.show', compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blogs)
    {
        $this->authorize('update', $blogs);
        return view('blogs.edit', compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogsRequest $request, Blogs $blogs)
    {
        $this->authorize('update', $blogs);
        $blogs->update($request->validated());

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Approve the specified blog.
     */
    public function approve(Blogs $blogs)
    {
        $this->authorize('approve', $blogs);

        $blogs->update([
            'approval_status' => 'approved',
            'approved_by' => Auth::id()
        ]);

        return back()->with('success', 'Blog approved successfully.');
    }

    /**
     * Deny the specified blog.
     */
    public function deny(Blogs $blogs)
    {
        $this->authorize('approve', $blogs);

        $blogs->update([
            'approval_status' => 'denied',
            'approved_by' => Auth::id()
        ]);

        return back()->with('error', 'Blog denied.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blogs)
    {
        $this->authorize('delete', $blogs);

        $blogs->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
