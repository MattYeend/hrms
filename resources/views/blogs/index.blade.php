@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>{{ __('blogs.blogs') }}</span>
            @can('create', App\Models\Blogs::class)
                <a href="{{ route('blogs.create') }}" class="btn btn-success">{{ __('blogs.create') }}</a>
            @endcan
        </div>
        <div class="card-body">
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
                    @forelse($blogs as $blog)
                        <tr>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->status }}</td>
                            <td>{{ $blog->approval_status }}</td>
                            <td>{{ $blog->blogType->name }}</td>
                            <td>{{ $blog->author_name }}</td>
                            <td>
                                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('blogs.view') }}</a>
                                @can('update', $blog)
                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">{{ __('blogs.edit') }}</a>
                                @endcan
                                @can('delete', $blog)
                                    <form action="{{ route('blogs.delete', $blog->id) }}" method="POST" style="display:inline;">
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
                    @empty
                        <tr>
                            <td colspan="6">{{ __('blogs.no_blogs') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
