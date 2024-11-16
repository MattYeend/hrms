@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- User Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Users</span>
            @can('create', App\Models\User::class)
                <a href="{{ route('user.create') }}" class="btn btn-success">{{ __('users.create') }}</a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('users.name') }}</th>
                        <th>{{ __('users.email') }}</th>
                        <th>{{ __('users.role') }}</th>
                        <th>{{ __('users.department') }}</th>
                        <th>{{ __('users.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->getFullNameLong() }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name ?? 'N/A' }}</td>
                            <td>{{ $user->department->name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('users.view') }}</a>
                                @can('update', $user)
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm d-block mb-2">{{ __('users.edit') }}</a>
                                @endcan
                                @can('delete', $user)
                                    @if (auth()->user()->id !== $user->id)
                                        <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm d-block mb-2" onclick="return confirm('Are you sure?')">{{ __('users.delete') }}</button>
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
