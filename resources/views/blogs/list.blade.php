@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('blogs.all_blogs') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        @forelse($blogs as $blog)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h3>{{ $blog->title }}</h3>
                                    <h3>{{ $blog->blogType->name }}</h3>
                                    <p>{{ Str::limit($blog->content, 150) }}</p>
                                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info">{{ __('blogs.read_more') }}</a>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="6">{{ __('blogs.no_blogs') }}</td>
                            </tr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
