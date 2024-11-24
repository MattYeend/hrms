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
                                        <th>{{ __('companies.name') }}</th>
                                        <th>{{ __('companies.company_contact') }}</th>
                                        <th>{{ __('companies.pay_day') }}</th>
                                        <th>{{ __('companies.active') }}</th>
                                        <th>{{ __('companies.work_weekdays') }}</th>
                                        <th>{{ __('companies.contract') }}</th>
                                        <th>{{ __('companies.address') }}</th>
                                        <th>{{ __('companies.company_relationship_manager') }}</th>
                                        <th>{{ __('companies.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companies as $company)
                                        <tr>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->company_contact }}</td>
                                            <td>{{ $company->pay_day }}</td>
                                            <td>{{ $company->active }}</td>
                                            <td>{{ $company->work_weekdays }}</td>
                                            <td>{{ $company->contract }}</td>
                                            <td>{{ $company->address }}</td>
                                            <td>{{ $company->company_relationship_manager }}</td>
                                            <td>
                                                <a href="{{ route('company.show', $company->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('users.view') }}</a>
                                                @can('update', $company)
                                                    <a href="{{ route('company.edit', $company->id) }}" class="btn btn-warning btn-sm d-block mb-2">{{ __('users.edit') }}</a>
                                                @endcan
                                                @can('delete', $company)
                                                    @if (auth()->user()->id !== $company->user_id)
                                                        <form action="{{ route('company.delete', $company->id) }}" method="POST" style="display: inline-block;">
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
                                {{ $companies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection