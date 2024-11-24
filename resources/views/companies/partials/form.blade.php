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

            <!-- Work Arrangement -->
            <!-- Office Based -->
            <div class="mb-3">
                <label for="office_based">{{ __('users.office') }}</label>
                <input type="checkbox" name="office_based" id="office_based" value="1" {{ old('office_based', $user->office_based ?? false) ? 'checked' : '' }}>
            </div>

            <!-- Remote Based -->
            <div class="mb-3">
                <label for="remote_based">{{ __('users.remote') }}</label>
                <input type="checkbox" name="remote_based" id="remote_based" value="1" {{ old('remote_based', $user->remote_based ?? false) ? 'checked' : '' }}>
            </div>

            <!-- Hybrid Based -->
            <div class="mb-3">
                <label for="hybrid_based">{{ __('users.hybrid') }}</label>
                <input type="checkbox" name="hybrid_based" id="hybrid_based" value="1" {{ old('hybrid_based', $user->hybrid_based ?? false) ? 'checked' : '' }}>
            </div>

            <!-- Profile Picture -->
            <div class="mb-3">
                <label for="profile_picture">{{ __('users.profile_picture') }}</label>
                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                @if(isset($user) && $user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="profile_picture" class="profile-picture-circle">
                @endif
            </div>

            <!-- CV -->
            <div class="mb-3">
                <label for="cv">{{ __('users.cv') }}</label>
                <input type="file" name="cv" id="cv" class="form-control">
                @if(isset($user) && $user->cv_path)
                    <a href="{{ asset('storage/' . $user->cv_path) }}" target="_blank">{{ __('users.download_cv') }}</a>
                @endif
            </div>

            <!-- Cover Letter -->
            <div class="mb-3">
                <label for="cover_letter">{{ __('users.cover_letter') }}</label>
                <input type="file" name="cover_letter" id="cover_letter" class="form-control">
                @if(isset($user) && $user->cover_letter)
                    <a href="{{ asset('storage/' . $user->cover_letter) }}" target="_blank">{{ __('users.download_cover_letter') }}</a>
                @endif
            </div>

            <!-- Department Select -->
            <div class="mb-3">
                <label for="department_id">{{ __('users.department') }}</label>
                <select name="department_id" id="department_id" class="form-control">
                    <option value="" disabled selected>{{ __('users.select_option') }}</option>
                    @foreach($departments as $department)
                        <option
                            value="{{ $department->id }}" {{ old('department_id', $user->department_id ?? '') == $department->id ? 'selected' : '' }}>
                            {{ $department->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Role Select -->
            <div class="mb-3">
                <label for="role_id">{{ __('users.role') }}</label>
                <select name="role_id" id="role_id" class="form-control">
                    <option value="" disabled selected>{{ __('users.select_option') }}</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ old('roles_id', $user->roles_id ?? '') == $role->id ? 'selected' : '' }}>
                            {{ $role->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Seniority Select -->
            <div class="mb-3">
                <label for="seniority_id">{{ __('users.seniority') }}</label>
                <select name="seniority_id" id="seniority_id" class="form-control">
                    <option value="" disabled selected>{{ __('users.select_option') }}</option>
                    @foreach($seniorities as $seniority)
                        <option value="{{ $seniority->id }}" {{ old('seniority_id', $user->seniority_id ?? '') == $seniority->id ? 'selected' : '' }}>
                            {{ $seniority->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Job Select -->
            <div class="mb-3">
                <label for="job_id">{{ __('users.job') }}</label>
                <select name="job_id" id="job_id" class="form-control">
                    <option value="" disabled selected>{{ __('users.select_option') }}</option>
                        @foreach($jobs as $job)
                        <option value="{{ $job->id }}" {{ old('job_id', $user->job_id ?? '') == $job->id ? 'selected' : '' }}>
                            {{ $job->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Holiday Entitlement Select -->
            <div class="mb-3">
                <label for="holiday_entitlement_id">{{ __('users.holiday_entitlement') }}</label>
                <select name="holiday_entitlement_id" id="holiday_entitlement_id" class="form-control">
                    <option value="" disabled selected>{{ __('users.select_option') }}</option>
                    @foreach($holidayEntitlements as $entitlement)
                        <option value="{{ $entitlement->id }}" {{ old('holiday_entitlement_id', $user->holiday_entitlement_id ?? '') == $entitlement->id ? 'selected' : '' }}>
                            {{ $entitlement->total }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Contact Select -->
            <div class="mb-3">
                <label for="contact_id">{{ __('users.contact') }}</label>
                <select name="contact_id" id="contact_id" class="form-control">
                    <option value="" disabled selected>{{ __('users.select_option') }}</option>
                    @foreach($userContacts as $contact)
                        <option value="{{ $contact->id }}" {{ old('contact_id', $user->contact_id ?? '') == $contact->id ? 'selected' : '' }}>
                            {{ $contact->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($company) ? 'Update ' . $company->name : 'Create' }}</button>
    </div>
</form>