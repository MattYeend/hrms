@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>{{ __('company_contact.company_contact') }}</span>
            @can('create', App\Models\CompanyContact::class)
                <a href="{{ route('companyContact.create') }}" class="btn btn-success">{{ __('company_contact.create') }}</a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('company_contact.name') }}</th>
                        <th>{{ __('company_contact.email') }}</th>
                        <th>{{ __('company_contact.phone') }}</th>
                        <th>{{ __('company_contact.company') }}</th>
                        <th>{{ __('company_contact.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $companyContact)
                        <tr>
                            <td>{{ $companyContact->is_live ? $companyContact->name : __('company_contact.is_test') . ' ' . $companyContact->name }}</td>
                            <td>{{ $companyContact->email }}</td>
                            <td>{{ $companyContact->phone ?? __('company_contact.not_provided') }}</td>
                            <td>{{ $companyContact->company->name ?? __('company_contact.not_provided') }}</td>
                            <td>
                                <a href="{{ route('companyContact.show', $companyContact->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('company_contact.view') }}</a>
                                @can('update', $companyContact)
                                    <a href="{{ route('companyContact.edit', $companyContact->id) }}" class="btn btn-warning btn-sm d-block mb-2">{{ __('company_contact.edit') }}</a>
                                @endcan
                                @can('delete', $companyContact)
                                    <form action="{{ route('companyContact.delete', $companyContact->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-block mb-2" onclick="return confirm('Are you sure?')">{{ __('company_contact.delete') }}</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">{{ __('company_contact.no_contacts') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
