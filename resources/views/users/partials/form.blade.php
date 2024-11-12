<form action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($user))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <!-- Name -->
            <div class="mb-3">
                <label for="first_name">{{ __('users.first_name') }} @if(!isset($user))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="first_name" id="first_name"class="form-control" value="{{ old('first_name', $user->first_name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="middle_name">{{ __('users.middle_name') }}</label>
                <input type="text" name="middle_name" id="middle_name"class="form-control" value="{{ old('middle_name', $user->middle_name ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="last_name">{{ __('users.last_name') }} @if(!isset($user))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="last_name" id="last_name"class="form-control" value="{{ old('last_name', $user->last_name ?? '') }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email">{{ __('users.email') }} @if(!isset($user))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password">{{ __('users.password') }} @if(!isset($user))<span class="text-danger">*</span>@endif</label>
                <input type="password" name="password" id="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
            </div>

            <!-- Password Confirmation -->
            <div class="mb-3">
                <label for="password_confirmation">{{ __('users.confirm_password') }} @if(!isset($user))<span class="text-danger">*</span>@endif</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" {{ isset($user) ? '' : 'required' }}>
            </div>

            <!-- Phone Number -->
            <div class="mb-3">
                <label for="phone">{{ __('users.phone') }}</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone ?? '') }}">
            </div>

            <!-- Salary -->
            <div class="mb-3">
                <label for="salary">{{ __('users.salary') }} @if(!isset($user))<span class="text-danger">*</span>@endif</label>
                <input type="number" name="salary" id="salary" class="form-control" value="{{ old('salary', $user->salary ?? '') }}" required>
            </div>

            <!-- Address Line 1 -->
            <div class="mb-3">
                <label for="first_line">{{ __('users.first_line') }} @if(!isset($user))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="first_line" id="first_line" class="form-control" value="{{ old('first_line', $user->first_line ?? '') }}" required>
            </div>

            <!-- Address Line 2 -->
            <div class="mb-3">
                <label for="second_line">{{ __('users.second_line') }}</label>
                <input type="text" name="second_line" id="second_line" class="form-control" value="{{ old('second_line', $user->second_line ?? '') }}">
            </div>

            <!-- Town -->
            <div class="mb-3">
                <label for="town">{{ __('users.town') }}</label>
                <input type="text" name="town" id="town" class="form-control" value="{{ old('town', $user->town ?? '') }}">
            </div>

            <!-- City -->
            <div class="mb-3">
                <label for="city">{{ __('users.city') }}</label>
                <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $user->city ?? '') }}">
            </div>

            <!-- County -->
            <div class="mb-3">
                <label for="county">{{ __('users.county') }}</label>
                <input type="text" name="county" id="county" class="form-control" value="{{ old('county', $user->county ?? '') }}">
            </div>

            <!-- Country -->
            <div class="mb-3">
                <label for="country">{{ __('users.country') }} @if(!isset($user))<span class="text-danger">*</span>@endif</label>
                <select id="country" name="country" onchange="showRegions()" class="form-control" required>
                    <option value="" disabled {{ old('country', $user->country ?? '') === '' ? 'selected' : '' }}>{{ __('users.select_option') }}</option>
                    @if(is_array($regions))
                        @foreach ($regions as $country => $regionsList)
                            <option value="{{ $country }}" {{ old('country', $user->country ?? '') === $country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <!-- Post Code -->
            <div class="mb-3">
                <label for="post_code">{{ __('users.post_code') }} @if(!isset($user))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="post_code" id="post_code" class="form-control" value="{{ old('post_code', $user->post_code ?? '') }}" required>
            </div>

            <!-- Full or part time staff -->
            <div class="mb-3">
                <label for="full_or_part">{{ __('users.full_or_part') }} 
                    @if(!isset($user))<span class="text-danger">*</span>@endif
                </label>
                <select name="full_or_part" id="full_or_part" class="form-control" required>
                    <option value="" disabled selected>{{ __('users.select_option') }}</option>
                    <option value="full_time" {{ old('full_or_part', $user->full_or_part ?? '') == 'full_time' ? 'selected' : '' }}>
                        {{ __('users.full_time') }}
                    </option>
                    <option value="part_time" {{ old('full_or_part', $user->full_or_part ?? '') == 'part_time' ? 'selected' : '' }}>
                        {{ __('users.part_time') }}
                    </option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Region -->
            <div class="mb-3">
                <label for="region">{{ __('users.region') }} @if(!isset($user))<span class="text-danger">*</span>@endif</label>
                <select id="region" name="region" class="form-control" required>
                    <option value="" disabled {{ old('region', $user->region ?? '') === '' ? 'selected' : '' }}>{{ __('users.select_option') }}</option>
                    @if(is_array($regions))
                        @foreach ($regions as $country => $regionsList)
                            <optgroup label="{{ $country }}" class="region-group" data-country="{{ $country }}" style="display: none;">
                                @foreach ($regionsList as $region)
                                    <option value="{{ $region }}" {{ old('region', $user->region ?? '') === $region ? 'selected' : '' }}>{{ $region }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    @endif
                </select>
            </div>

            <!-- Time Zone -->
            <div class="mb-3">
                <label for="timezone">{{ __('users.timezone') }} @if(!isset($user))<span class="text-danger">*</span>@endif</label>
                <select name="timezone" id="timezone" class="form-control" required>
                    <option value="" disabled selected>{{ __('users.select_option') }}</option>
                    @foreach($timezones as $timezone)
                        <option value="{{ $timezone }}" {{ old('timezone', $user->timezone ?? '') == $timezone ? 'selected' : '' }}>
                            {{ $timezone }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Start date -->
            <div class="mb-3">
                <label for="start_date">{{ __('users.start_date') }} @if(!isset($user))<span class="text-danger">*</span>@endif</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $user->start_date ?? '') }}" required>
            </div>

            <!-- End Date -->
            <div class="mb-3">
                <label for="end_date">{{ __('users.end_date') }}</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $user->end_date ?? '') }}">
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
        <button class="btn btn-primary" type="submit">{{ isset($user) ? 'Update ' . $user->getShortName() : 'Create' }}</button>
    </div>
</form>

<script>
    function showRegions() {
        const selectedCountry = document.getElementById('country').value;

        document.querySelectorAll('.region-group').forEach(optgroup => {
            optgroup.style.display = optgroup.getAttribute('data-country') === selectedCountry ? 'block' : 'none';
        });
    }

    document.addEventListener("DOMContentLoaded", () => {
        showRegions();
    });
</script>