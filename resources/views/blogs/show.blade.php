@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $blog->title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <p><strong>{{ __('blogs.status') }}:</strong> {{ $blog->status }}</p>
                        <p><strong>{{ __('blogs.approval_status') }}:</strong> {{ $blog->approval_status }}</p>
                        <p><strong>{{ __('blogs.blog_type') }}:</strong> {{ $blog->blogType->name }}</p>
                        <p><strong>{{ __('blogs.content') }}:</strong></p>
                        <p>{{ $blog->content }}</p>
                        <p><strong>{{ __('blogs.author') }}:</strong> {{ $blog->author->name }}</p>
                        @if($blog->approval_status == 'approved')
                            <a href="{{ route('blogs.list') }}" class="btn btn-primary">{{ __('blogs.back_to_list') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
