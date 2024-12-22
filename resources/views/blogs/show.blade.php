@extends('layouts.app')

@section('content')
    <h1>{{ $blog->title }}</h1>

    <div>
        <p><strong>Status:</strong> {{ $blog->status }}</p>
        <p><strong>Approval Status:</strong> {{ $blog->approval_status }}</p>
        <p><strong>Content:</strong></p>
        <p>{{ $blog->content }}</p>
        <p><strong>Author:</strong> {{ $blog->author->name }}</p>
        @if($blog->approval_status == 'approved')
            <a href="{{ route('blogs.list') }}" class="btn btn-primary">Back to Blog List</a>
        @endif
    </div>
@endsection
