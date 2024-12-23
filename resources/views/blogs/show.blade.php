@extends('layouts.app')

@section('content')
    <h1>{{ $blog->title }}</h1>

    <div>
        <p><strong>{{ __('blogs.status') }}:</strong> {{ $blog->status }}</p>
        <p><strong>{{ __('blogs.approval_status') }}:</strong> {{ $blog->approval_status }}</p>
        <p><strong>{{ __('blogs.blog_type') }}:</strong> {{ $blog->blogType->name }}</p>
        <p><strong>{{ __('blogs.content') }}:</strong></p>
        <p>{{ $blog->content }}</p>
        <p><strong>{{ __('blogs.author') }}:</strong> {{ $blog->author->name }}</p>
        @if($blog->approval_status == 'approved')
            <a href="{{ route('blogs.list') }}" class="btn btn-primary">Back to Blog List</a>
        @endif
    </div>
@endsection
