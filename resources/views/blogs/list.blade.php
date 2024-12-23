@extends('layouts.app')

@section('content')
    <h1>{{ __('blogs.all_blogs') }}</h1>

    @foreach($blogs as $blog)
        <div class="card mt-3">
            <div class="card-body">
                <h3>{{ $blog->title }}</h3>
                <h3>{{ $blog->blogType->name }}</h3>
                <p>{{ Str::limit($blog->content, 150) }}</p>
                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info">{{ __('blogs.read_more') }}</a>
            </div>
        </div>
    @endforeach
@endsection
