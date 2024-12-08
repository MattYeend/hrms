@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>{{ __('contracts.name')}}</span>
            @can('create', App\Models\Contract::class)
                <a href="{{ route('contract.create') }}" class="btn btn-success">{{ __('contracts.create') }}</a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('contracts.name') }}</th>
                        <th>{{ __('contracts.start') }}</th>
                        <th>{{ __('contracts.end') }}</th>
                        <th>{{ __('contracts.licence') }}</th>
                        <th>{{ __('contracts.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contracts as $contract)
                        <tr>
                            <td>{{ $contract->name }}</td>
                            <td>{{ $contract->start->format('d/m/Y') }}</td>
                            <td>{{ $contract->end->format('d/m/Y') }}</td>
                            <td>{{ $contract->licence->name }}</td>
                            <td>
                                <a href="{{ route('contract.show', $contract->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('contracts.view') }}</a>
                                @can('update', $contract)
                                    <a href="{{ route('contract.edit', $contract->id) }}" class="btn btn-warning btn-sm d-block mb-2">{{ __('contracts.edit') }}</a>
                                @endcan
                                @can('delete', $contract)
                                    @if (auth()->user()->id !== $contract->id)
                                        <form action="{{ route('contract.delete', $contract->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm d-block mb-2" onclick="return confirm('Are you sure?')">{{ __('contracts.delete') }}</button>
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
                {{ $contracts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
