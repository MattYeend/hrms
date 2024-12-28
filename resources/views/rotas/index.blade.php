@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('rotas.rotas') }}</span>
                    @can('create', App\Models\Rotas::class)
                        <a href="{{ route('rotas.create') }}" class="btn btn-success">{{ __('rotas.create') }}</a>
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
                                        <th>{{ __('rotas.user') }}</th>
                                        <th>{{ __('rotas.department') }}</th>
                                        <th>{{ __('rotas.start_time') }}</th>
                                        <th>{{ __('rotas.end_time') }}</th>
                                        <th>{{ __('rotas.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($rotas) > 0)
                                        @foreach($rotas as $rota)
                                            <tr>
                                                <td>{{ $rota->user->getFullNameLong() }}</td>
                                                <td>{{ $rota->user->department->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($rota->start_time)->format('d/m/y H:i') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($rota->end_time)->format('d/m/y H:i') }}</td>
                                                <td>
                                                    <a href="{{ route('rotas.show', $rota->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('users.view') }}</a>
                                                    @can('update', $rota)
                                                        <a href="{{ route('rotas.edit', $rota->id) }}" class="btn btn-warning btn-sm d-block mb-2">{{ __('users.edit') }}</a>
                                                    @endcan
                                                    @can('delete', $rota)
                                                        @if (auth()->user()->id !== $rota->user_id)
                                                            <form action="{{ route('rotas.delete', $rota->id) }}" method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm d-block mb-2" onclick="return confirm('Are you sure?')">{{ __('users.delete') }}</button>
                                                            </form>
                                                        @endif
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">{{ __('rotas.no_rotas') }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-center">
                                {{ $rotas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection