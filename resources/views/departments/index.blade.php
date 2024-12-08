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
                    <span>{{ __('departments.department') }}</span>
                    @can('create', App\Models\Department::class)
                        <a href="{{ route('departments.create') }}" class="btn btn-success">{{ __('departments.create') }}</a>
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
                                        <th>{{ __('departments.name') }}</th>
                                        <th>{{ __('departments.company') }}</th>
                                        <th>{{ __('departments.dept_lead') }}</th>
                                        <th>{{ __('departments.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($departments as $department)
                                        <tr>
                                            <td>{{ $department->name }}</td>
                                            <td>{{ $department->company->name ?? __('departments.not_provided') }}</td>
                                            <td>{{ $department->departmentLead->getName() ?? __('departments.not_provided') }}</td>
                                            <td>
                                                <a href="{{ route('departments.show', $department->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('departments.view') }}</a>
                                                @can('update', $department)
                                                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm d-block mb-2">{{ __('departments.edit') }}</a>
                                                @endcan
                                                @can('delete', $department)
                                                    @if ($department->users->isEmpty())
                                                        <form action="{{ route('departments.delete', $department->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm d-block mb-2" onclick="return confirm('Are you sure?')">{{ __('departments.delete') }}</button>
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
                                {{ $departments->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection