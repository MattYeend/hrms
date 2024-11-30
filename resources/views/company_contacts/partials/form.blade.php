<form action="{{ isset($companyContact) ? route('companyContact.update', $companyContact->id) : route('companyContact.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($companyContact))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <!-- Name -->
            <div class="mb-3">
                <label for="name">{{ __('company_contact.name') }} @if(!isset($companyContact))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="name" id="name"class="form-control" value="{{ old('name', $companyContact->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="email">{{ __('company_contact.email') }} @if(!isset($companyContact))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="email" id="email"class="form-control" value="{{ old('email', $companyContact->email ?? '') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Phone Number -->
            <div class="mb-3">
                <label for="phone">{{ __('company_contact.phone') }}</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $companyContact->phone ?? '') }}">
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($companyContact) ? __('company_contact.edit') . ' ' . $companyContact->name : __('company_contact.create') }}</button>
    </div>
</form>