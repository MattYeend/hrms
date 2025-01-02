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
                    <span>{{ __('notes.notes') }}</span>
                    @can('create', App\Models\Notes::class)
                        <a href="{{ route('notes.create') }}" class="btn btn-success">{{ __('notes.create') }}</a>
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
                                        <th>{{ __('notes.name') }}</th>
                                        <th>{{ __('notes.description') }}</th>
                                        <th>{{ __('notes.note_type') }}</th>
                                        <th>{{ __('notes.user') }}</th>
                                        <th>{{ __('notes.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($notes as $note)
                                        <tr>
                                            <td>{{ $note->name }}</td>
                                            <td>{{ $note->description }}</td>
                                            <td>{{ $note->noteType->name }}</td>
                                            <td>{{ $note->users->getName() ?? __('notes.not_provided') }}</td>
                                            <td>
                                                <a href="{{ route('notes.show', $note->id) }}" class="btn btn-primary btn-sm d-block mb-2">{{ __('notes.view') }}</a>
                                                @can('update', $note)
                                                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning btn-sm d-block mb-2">{{ __('notes.edit') }}</a>
                                                @endcan
                                                @can('delete', $note)
                                                    @if ($note->users->isEmpty())
                                                        <form action="{{ route('notes.delete', $notes->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm d-block mb-2" onclick="return confirm('Are you sure?')">{{ __('notes.delete') }}</button>
                                                        </form>
                                                    @endif
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">{{ __('notes.no_notes') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-center">
                                {{ $notes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection