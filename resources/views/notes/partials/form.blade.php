<form action="{{ isset($notes) ? route('notes.update', $notes->id) : route('notes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($notes))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name">{{ __('notes.name') }} @if(!isset($notes))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="name" id="name"class="form-control" value="{{ old('name', $notes->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="description">{{ __('notes.description') }} @if(!isset($notes))<span class="text-danger">*</span>@endif</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $notes->description ?? '') }}</textarea>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="note_type_id">{{ __('notes.note_type') }}</label>
                <select name="note_type_id" id="note_type_id" class="form-control">
                    <option value="" disabled selected>{{ __('notes.select_option') }}</option>
                    @foreach($noteTypes as $noteType)
                        <option value="{{ $noteType->id }}" {{ old('note_type_id', $notes->note_type_id ?? '') == $companies->id ? 'selected' : '' }}>
                            {{ $noteType->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="user">{{ __('notes.assign_user') }}</label>
                <select name="user" id="user" class="form-control">
                    <option value="" disabled selected>{{ __('notes.select_option') }}</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" 
                                {{ isset($selectedUser) && $selectedUser == $user->id ? 'selected' : '' }}>
                            {{ $user->getName() }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($notes) ? __('notes.edit') . ' ' . $notes->name : __('notes.create') }}</button>
    </div>
</form>