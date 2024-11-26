<form action="{{ isset($addressBook) ? route('addressBook.update', $addressBook->id) : route('addressBook.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($addressBook))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="first_line">{{ __('address_book.name') }} @if(!isset($addressBook))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="first_line" id="first_line"class="form-control" value="{{ old('first_line', $addressBook->first_line ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="second_line">{{ __('address_book.second_line') }}</label>
                <input type="text" name="second_line" id="second_line"class="form-control" value="{{ old('second_line', $addressBook->second_line ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="town">{{ __('address_book.town') }}</label>
                <input type="text" name="town" id="town" class="form-control" value="{{ old('town', $addressBook->town ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="city">{{ __('address_book.city') }}</label>
                <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $addressBook->city ?? '') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="county">{{ __('address_book.county') }}</label>
                <input type="text" name="county" id="county" class="form-control" value="{{ old('county', $addressBook->county ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="country">{{ __('address_book.country') }} @if(!isset($addressBook))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="country" id="country" class="form-control" value="{{ old('country', $addressBook->country ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="post_code">{{ __('address_book.post_code') }} @if(!isset($addressBook))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="post_code" id="post_code" class="form-control" value="{{ old('post_code', $addressBook->post_code ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="head_office">{{ __('address_book.head_office') }} @if(!isset($addressBook))<span class="text-danger">*</span>@endif</label>
                <input type="checkbox" name="head_office" id="head_office" value="1" {{ old('head_office', $addressBook->head_office ?? false) ? 'checked' : '' }}>
            </div>

            <div class="mb-3">
                <label for="address_contact_id">{{ __('address_book.role') }}</label>
                <select name="address_contact_id" id="address_contact_id" class="form-control">
                    <option value="" disabled selected>{{ __('address_book.select_option') }}</option>
                    @foreach($addressContact as $contact)
                        <option value="{{ $contact->id }}" {{ old('address_contact_id', $addressBook->address_contact_id ?? '') == $contact->id ? 'selected' : '' }}>
                            {{ $contact->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($addressBook) ? 'Update' : 'Create' }}</button>
    </div>
</form>