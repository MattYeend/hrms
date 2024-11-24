<form action="{{ isset($company) ? route('company.update', $company->id) : route('company.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($company))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name">{{ __('companies.name') }} @if(!isset($company))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="name" id="name"class="form-control" value="{{ old('name', $company->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="company_contact">{{ __('companies.company_contact') }}</label>
                <input type="text" name="company_contact" id="company_contact"class="form-control" value="{{ old('company_contact', $company->company_contact ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="pay_day">{{ __('companies.pay_day') }} @if(!isset($company))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="pay_day" id="pay_day"class="form-control" value="{{ old('pay_day', $company->pay_day ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="active">{{ __('companies.active') }} @if(!isset($company))<span class="text-danger">*</span>@endif</label>
                <input type="checkbox" name="active" id="active" value="1" {{ old('active', $company->active ?? false) ? 'checked' : '' }}>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="work_weekdays">{{ __('companies.work_weekdays') }} @if(!isset($company))<span class="text-danger">*</span>@endif</label>
                <input type="checkbox" name="work_weekdays" id="work_weekdays" value="1" {{ old('work_weekdays', $company->work_weekdays ?? false) ? 'checked' : '' }}>
            </div>

            <div class="mb-3">
                <label for="contract">{{ __('companies.contract') }} @if(!isset($company))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="contract" id="contract" class="form-control" value="{{ old('contract', $company->contract ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="address">{{ __('companies.address') }} @if(!isset($company))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $company->address ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="company_relationship_manager">{{ __('companies.company_relationship_manager') }} @if(!isset($company))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="company_relationship_manager" id="company_relationship_manager" class="form-control" value="{{ old('company_relationship_manager', $company->company_relationship_manager ?? '') }}" required>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($company) ? 'Update ' . $company->name : 'Create' }}</button>
    </div>
</form>