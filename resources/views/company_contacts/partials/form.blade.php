<form action="{{ isset($CompanyContact) ? route('companyContact.update', $CompanyContact->id) : route('companyContact.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($CompanyContact))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <!-- Name -->
            <div class="mb-3">
                <label for="name">{{ __('company_contact.name') }} @if(!isset($CompanyContact))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="name" id="name"class="form-control" value="{{ old('name', $CompanyContact->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="email">{{ __('company_contact.email') }} @if(!isset($CompanyContact))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="email" id="email"class="form-control" value="{{ old('email', $CompanyContact->email ?? '') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Phone Number -->
            <div class="mb-3">
                <label for="phone">{{ __('company_contact.phone') }}</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $CompanyContact->phone ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="company_id">{{ __('company_contact.company') }}</label>
                <select name="company_id" id="company_id" class="form-control">
                    <option value="" disabled selected>{{ __('company_contact.select_option') }}</option>
                        @foreach($companys as $company)
                        <option value="{{ $job->id }}" {{ old('company_id', $CompanyContact->company_id ?? '') == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($CompanyContact) ? 'Update ' . $CompanyContact->name : 'Create' }}</button>
    </div>
</form>