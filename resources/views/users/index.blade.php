@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ __('users.user_management') }}</h1>

    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Create User Button -->
    @can('create', App\Models\User::class) <!-- Optional: Use authorization to check if the user can create -->
        <div class="mb-3">
            <a href="{{ route('user.create') }}" class="btn btn-success">{{ __('users.create') }}</a>
        </div>
    @endcan

    <!-- User Table -->
    <div class="card">
        <div class="card-header">Users</div>
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
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name ?? 'N/A' }}</td>
                            <td>{{ $user->department->name ?? 'N/A' }}</td>
                            <td>
                                <!-- View Profile -->
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-sm">{{ __('users.view') }}</a>

                                <!-- Edit User -->
                                @can('update', $user)
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">{{ __('users.edit') }}</a>
                                @endcan

                                <!-- Delete User -->
                                @can('delete', $user)
                                    @if (auth()->user()->id !== $user->id) <!-- Prevent self-deletion -->
                                        <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">{{ __('users.delete') }}</button>
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
