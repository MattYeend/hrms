<form action="{{ isset($addressContact) ? route('address$addressContact.update', $addressContact->id) : route('addressContact.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($addressContact))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name">{{ __('address_book_contacts.name') }} @if(!isset($addressContact))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="name" id="name"class="form-control" value="{{ old('name', $addressContact->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="email">{{ __('address_book_contacts.email') }}</label>
                <input type="text" name="email" id="email"class="form-control" value="{{ old('email', $addressContact->email ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="phone">{{ __('address_book_contacts.phone') }}</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $addressContact->phone ?? '') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="position">{{ __('address_book_contacts.position') }}</label>
                <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $addressContact->position ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="main_contact">{{ __('address_book_contacts.main_contact') }}</label>
                <input type="checkbox" name="main_contact" id="main_contact" value="1" {{ old('main_contact', $addressContact->main_contact ?? false) ? 'checked' : '' }}>
            </div>

            <div class="mb-3">
                <label for="secondary_contact">{{ __('address_book_contacts.secondary_contact') }}</label>
                <input type="checkbox" name="secondary_contact" id="secondary_contact" value="1" {{ old('secondary_contact', $addressContact->secondary_contact ?? false) ? 'checked' : '' }}>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($addressContact) ? __('address_book_contacts.edit') : __('address_book_contacts.create') }}</button>
    </div>
</form>