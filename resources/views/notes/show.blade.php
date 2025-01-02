@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $notes->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{ __('notes.name') }}: {{ $notes->name }}</p>
                            <p>{{ __('notes.description') }}: {{ $notes->description }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('notes.note_type') }}: {{ $notes->noteType->name }}</p>
                            <p>{{ __('notes.user') }}: {{ $notes->users->getName() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
