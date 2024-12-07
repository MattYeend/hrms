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
                <label for="company_contact_id">{{ __('companies.company_contact') }}</label>
                <select name="company_contact_id" id="company_contact_id" class="form-control">
                    <option value="" disabled selected>{{ __('companies.select_option') }}</option>
                    @foreach($companyContacts as $contact)
                        <option value="{{ $contact->id }}" {{ old('company_contact_id', $company->company_contact_id ?? '') == $contact->id ? 'selected' : '' }}>
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="pay_day">{{ __('companies.pay_day') }} @if(!isset($company))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="pay_day" id="pay_day"class="form-control" value="{{ old('pay_day', $company->pay_day ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="active">{{ __('companies.active') }} @if(!isset($company))<span class="text-danger">*</span>@endif</label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" name="active" id="active" value="1" {{ old('active', $company->active ?? false) ? 'checked' : '' }}>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="work_weekdays">{{ __('companies.work_weekdays') }} @if(!isset($company))<span class="text-danger">*</span>@endif</label>
                <input type="hidden" name="work_weekdays" value="0">
                <input type="checkbox" name="work_weekdays" id="work_weekdays" value="1" {{ old('work_weekdays', $company->work_weekdays ?? false) ? 'checked' : '' }}>
            </div>

            <div class="mb-3">
                <label for="contract_id">{{ __('companies.contract') }}</label>
                <select name="contract_id" id="contract_id" class="form-control">
                    <option value="" disabled selected>{{ __('companies.select_option') }}</option>
                    @foreach($contracts as $contract)
                        <option value="{{ $contract->id }}" {{ old('contract_id', $company->contract_id ?? '') == $contract->id ? 'selected' : '' }}>
                            {{ $contract->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="address_book_id">{{ __('companies.address') }}</label>
                <select name="address_book_id" id="address_book_id" class="form-control">
                    <option value="" disabled selected>{{ __('companies.select_option') }}</option>
                    @foreach($addresses as $address)
                        <option value="{{ $address->id }}" {{ old('address_book_id', $company->address_book_id ?? '') == $address->id ? 'selected' : '' }}>
                            {{ $address->first_line }}, {{ $address->country }}, {{ $address->post_code }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="company_relationship_manager">{{ __('companies.company_relationship_manager') }}</label>
                <select name="company_relationship_manager" id="company_relationship_manager" class="form-control">
                    <option value="" disabled selected>{{ __('companies.select_option') }}</option>
                    @foreach($relationshipManagers as $manager)
                        <option value="{{ $manager->id }}" {{ old('company_relationship_manager', $company->company_relationship_manager ?? '') == $manager->id ? 'selected' : '' }}>
                            {{ $manager->getName() }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($company) ? __('companies.edit') . ' ' . $company->name : __('companies.create') }}</button>
    </div>
</form>