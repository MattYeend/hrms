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
        $blog = Blogs::with(['author', 'approvedBy'])->latest()->paginate(10);
        return view('blogs.index', compact('blog'));
    }

    /**
     * Display a list view for published blogs.
     */
    public function listView()
    {
        $blog = Blogs::where('status', 'published')
                    ->where('approval_status', 'approved')
                    ->latest()
                    ->get();
        return view('blogs.list', compact('blog'));
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
    public function show(Blogs $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blog)
    {
        $this->authorize('update', $blog);
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogsRequest $request, Blogs $blog)
    {
        $this->authorize('update', $blog);
        $blog->update($request->validated());

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Approve the specified blog.
     */
    public function approve(Blogs $blog)
    {
        $this->authorize('approve', $blog);

        $blog->update([
            'approval_status' => 'approved',
            'approved_by' => Auth::id()
        ]);

        return back()->with('success', 'Blog approved successfully.');
    }

    /**
     * Deny the specified blog.
     */
    public function deny(Blogs $blog)
    {
        $this->authorize('approve', $blog);

        $blog->update([
            'approval_status' => 'denied',
            'approved_by' => Auth::id()
        ]);

        return back()->with('error', 'Blog denied.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blog)
    {
        $this->authorize('delete', $blog);

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
