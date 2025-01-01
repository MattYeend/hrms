<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Logger;
use App\Models\BlogTypes;
use App\Models\User;
use App\Http\Requests\StoreBlogsRequest;
use App\Http\Requests\UpdateBlogsRequest;
use Illuminate\Support\Facades\Auth;

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
        $blogs = Blogs::latest()->paginate(10);

        $authors = User::whereIn('id', $blogs->pluck('author'))->get()->keyBy('id');
    
        foreach ($blogs as $blog) {
            $blog->author_name = $authors[$blog->author]?->getName() ?? 'Unknown';
        }
    
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
        $blogTypes = BlogTypes::all();
        return view('blogs.create', compact('blogTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogsRequest $request)
    {
        $validated = $request->validated();
        $validated['author'] = Auth::id();
        $validated['status'] = 'draft';
        $validated['approval_status'] = 'pending';

        $blogs = Blogs::create($validated);
        Logger::log(Logger::ACTION_CREATE_BLOG, ['blogs' => $blogs]);

        return redirect()->route('blogs.index')->with('success', __('blogs.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blogs::find($id);
        if(!$blog){
            return response()->json(['message' => 'Blog not found'], 404);
        }
        $authors = User::whereIn('id', $blog->pluck('author'))->get()->keyBy('id');
    
        $blog->author_name = $authors[$blog->author]?->getName() ?? 'Unknown';
        Logger::log(Logger::ACTION_SH0W_BLOG, ['blog' => $blog]);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blog)
    {
        $this->authorize('update', $blog);
        $blogTypes = BlogTypes::all();
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
        return redirect()->route('blogs.index')->with('success', __('blogs.updated_success'));
    }

    /**
     * Approve the specified blog.
     */
    public function approve($slug)
    {
        $blog = Blogs::where('slug', $slug)->firstOrFail();

        $this->authorize('approve', $blog);

        $blog->update([
            'approval_status' => 'approved',
            'approved_by' => Auth::id(),
            'status' => 'published'
        ]);

        Logger::log(Logger::ACTION_APPROVE_BLOG, ['blog' => $blog]);

        return back()->with('success', __('blogs.approved'));
    }

    /**
     * Deny the specified blog.
     */
    public function deny($slug)
    {
        $blog = Blogs::where('slug', $slug)->firstOrFail();

        $this->authorize('approve', $blog);

        $blog->update([
            'approval_status' => 'denied',
            'approved_by' => Auth::id(),
        ]);

        Logger::log(Logger::ACTION_DENY_BLOG, ['blog' => $blog]);

        return back()->with('error', __('blogs.denied'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $this->authorize('delete', $blog);
        Logger::log(Logger::ACTION_DELETE_BLOG, ['blog' => $blog]);
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', __('blogs.deleted_success'));
    }
}
