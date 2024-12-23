@extends('layouts.app')

@section('content')
    <h1>{{ __('blogs.blogs') }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th>{{ __('blogs.title') }}</th>
                <th>{{ __('blogs.status') }}</th>
                <th>{{ __('blogs.approval_status') }}</th>
                <th>{{ __('blogs.blog_type') }}</th>
                <th>{{ __('blogs.author') }}</th>
                <th>{{ __('blogs.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->status }}</td>
                    <td>{{ $blog->approval_status }}</td>
                    <td>{{ $blog->blogType->name }}</td>
                    <td>{{ $blog->author->name }}</td>
                    <td>
                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('blogs.view') }}</a>
                        @can('update', $blog)
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">{{ __('blogs.edit') }}</a>
                        @endcan
                        @can('delete', $blog)
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">{{ __('blogs.delete') }}</button>
                            </form>
                        @endcan
                        @can('approve', $blog)
                            <form action="{{ route('blogs.approve', $blog->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">{{ __('blogs.approve') }}</button>
                            </form>
                            <form action="{{ route('blogs.deny', $blog->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">{{ __('blogs.deny') }}</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $blogs->links() }}
@endsection
