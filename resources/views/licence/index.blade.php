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
                    <span>{{ __('companies.company') }}</span>
                    @can('create', App\Models\Companies::class)
                        <a href="{{ route('company.create') }}" class="btn btn-success">{{ __('companies.create') }}</a>
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
                                        <th>{{ __('licences.name') }}</th>
                                        <th>{{ __('licences.price') }}</th>
                                        <th>{{ __('licences.created_by') }}</th>
                                        <th>{{ __('licences.updated_by') }}</th>
                                        <th>{{ __('companies.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($licences as $licence)
                                        <tr>
                                            <td>{{ $licence->name }}</td>
                                            <td>{{ $licence->price }}</td>
                                            <td>{{ $licence->created_by ?? __('licences.not_provided') }}</td>
                                            <td>{{ $licence->updated_by ?? __('licences.not_provided') }}</td>
                                            <td>
                                                <a href="{{ route('licence.show', $licence->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('licences.view') }}</a>
                                                @can('update', $licence)
                                                    <a href="{{ route('licence.edit', $licence->id) }}" class="btn btn-warning btn-sm d-block mb-2">{{ __('licences.edit') }}</a>
                                                @endcan
                                                @can('delete', $licence)
                                                    <form action="{{ route('licence.delete', $licence->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm d-block mb-2" onclick="return confirm('Are you sure?')">{{ __('licences.delete') }}</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-center">
                                {{ $licence->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection