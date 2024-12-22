<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Logger;
use App\Models\BlogTypes;
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
        $blogTypes = BlogType::all();
        return view('blogs.create', compact('blogTypes'));
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

        $blogs = Blogs::create($validated);
        Logger::log(Logger::ACTION_CREATE_BLOG, ['blogs' => $blogs]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $blog)
    {
        Logger::log(Logger::ACTION_SHOW_BLOG, ['blog' => $blog]);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blog)
    {
        $this->authorize('update', $blog);
        $blogTypes = BlogType::all();
        return view('blogs.edit', compact('blog', 'blogTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogsRequest $request, Blogs $blog)
    {
        $this->authorize('update', $blog);
        $blog->update($request->validated());
        Logger::log(Logger::ACTION_UPDATE_BLOG, ['blog' => $blog]);
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

        Logger::log(Logger::ACTION_APPROVE_BLOG, ['blog' => $blog]);

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

        Logger::log(Logger::ACTION_DENY_BLOG, ['blog' => $blog]);

        return back()->with('error', 'Blog denied.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blog)
    {
        $this->authorize('delete', $blog);
        Logger::log(Logger::ACTION_DELETE_BLOG, ['blog' => $blog]);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
