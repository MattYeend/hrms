@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('job.job') }}</span>
                    @can('create', App\Models\Job::class)
                        <a href="{{ route('job.create') }}" class="btn btn-success">{{ __('job.create') }}</a>
                    @endcan
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('job.name') }}</th>
                                        <th>{{ __('job.code') }}</th>
                                        <th>{{ __('job.probation_length') }}</th>
                                        <th>{{ __('job.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobs as $job)
                                        <tr>
                                            <td>{{ $job->name }}</td>
                                            <td>{{ $job->code ?? __('job.not_provided') }}</td>
                                            <td>{{ $job->probation_length ?? __('job.not_provided') }}</td>
                                            <td>
                                                <a href="{{ route('job.show', $job->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('job.view') }}</a>
                                                @can('update', $job)
                                                    <a href="{{ route('job.edit', $job->id) }}" class="btn btn-warning btn-sm d-block mb-2">{{ __('job.edit') }}</a>
                                                @endcan
                                                @can('delete', $job)
                                                    @if ($job->users->isEmpty())
                                                        <form action="{{ route('job.delete', $department->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm d-block mb-2" onclick="return confirm('Are you sure?')">{{ __('job.delete') }}</button>
                                                        </form>
                                                    @endif
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-center">
                                {{ $jobs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection