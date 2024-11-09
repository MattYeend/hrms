<form 
    action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" 
    method="POST" 
    enctype="multipart/form-data"
>
    @csrf
    @if(isset($user))
        @method('PUT')
    @endif

    <!-- Name -->
    <div>
        <label for="name">Name</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            value="{{ old('name', $user->name ?? '') }}" 
            required
        >
    </div>

    <!-- Email -->
    <div>
        <label for="email">Email</label>
        <input 
            type="text" 
            name="email" 
            id="email" 
            value="{{ old('email', $user->email ?? '') }}" 
            required
        >
    </div>

    <!-- Password -->
    <div>
        <label for="password">Password</label>
        <input 
            type="password" 
            name="password" 
            id="password" 
            {{ isset($user) ? '' : 'required' }}
        >
    </div>

    <!-- Password Confirmation -->
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input 
            type="password_confirmation" 
            name="password_confirmation" 
            id="password_confirmation" 
            {{ isset($user) ? '' : 'required' }}
        >
    </div>

    <!-- Phone Number -->
    <div>
        <label for="phone">Phone Number</label>
        <input 
            type="text"
            name="phone"
            id="phone"
            value="{{ old('phone', $user->phone ?? '') }}"
        >
    </div>

    <!-- Salary -->
    <div>
        <label for="salary">Salary</label>
        <input 
            type="number"
            name="salary"
            id="salary"
            value="{{ old('salary', $user->salary ?? '') }}" 
            required
        >
    </div>

    <!-- Address Line 1 -->
    <div>
        <label for="first_line">First Line of Address</label>
        <input 
            type="text"
            name="first_line"
            id="first_line"
            value="{{ old('first_line', $user->first_line ?? '') }}"
            required
        >
    </div>

    <!-- Address Line 2 -->
    <div>
        <label for="second_line">Second Line of Address</label>
        <input 
            type="text"
            name="second_line"
            id="second_line"
            value="{{ old('second_line', $user->second_line ?? '') }}"
        >
    </div>

    <!-- Town -->
    <div>
        <label for="town">Town</label>
        <input 
            type="text"
            name="town"
            id="town"
            value="{{ old('town', $user->town ?? '') }}"
        >
    </div>

    <!-- City -->
    <div>
        <label for="city">City</label>
        <input 
            type="text"
            name="city"
            id="city"
            value="{{ old('city', $user->city ?? '') }}"
        >
    </div>

    <!-- County -->
    <div>
        <label for="county">County</label>
        <input 
            type="text"
            name="county"
            id="county"
            value="{{ old('county', $user->county ?? '') }}"
        >
    </div>

    <!-- Country -->
    <div>
        <label for="country">Country</label>
        <input 
            type="text"
            name="country"
            id="country"
            value="{{ old('country', $user->country ?? '') }}"
            required
        >
    </div>

    <!-- Post Code -->
    <div>
        <label for="post_code">Post Code</label>
        <input 
            type="text"
            name="post_code"
            id="post_code"
            value="{{ old('post_code', $user->post_code ?? '') }}"
            required
        >
    </div>

    <!-- Full or part time staff -->
    <div>
        <label for="full_or_part">Full or Part Time</label>
        <input 
            type="text"
            name="full_or_part"
            id="full_or_part"
            value="{{ old('full_or_part', $user->full_or_part ?? '') }}"
            required
        >
    </div>

    <!-- Region -->
    <div>
        <label for="region">Region</label>
        <input 
            type="text"
            name="region"
            id="region"
            value="{{ old('region', $user->region ?? '') }}"
            required
        >
    </div>

    <!-- Time Zone -->
    <div>
        <label for="timezone">Timezone</label>
        <input 
            type="text"
            name="timezone"
            id="timezone"
            value="{{ old('timezone', $user->timezone ?? '') }}"
            required
        >
    </div>

    <!-- Start date -->
    <div>
        <label for="start_date">Start Date</label>
        <input 
            type="date"
            name="start_date"
            id="start_date"
            value="{{ old('start_date', $user->start_date ?? '') }}"
            required
        >
    </div>

    <!-- End Date -->
    <div>
        <label for="end_date">End Date Code</label>
        <input 
            type="date"
            name="end_date"
            id="end_date"
            value="{{ old('end_date', $user->end_date ?? '') }}"
        >
    </div>

    <!-- Work Arrangement -->
    <!-- Office Based -->
    <div>
        <label for="office_based">Office-Based</label>
        <input 
            type="checkbox" 
            name="office_based" 
            id="office_based" 
            value="1" 
                {{ old('office_based', $user->office_based ?? false) ? 'checked' : '' }}>
    </div>

    <!-- Remote Based -->
    <div>
        <label for="remote_based">Remote-Based</label>
        <input 
            type="checkbox" 
            name="remote_based" 
            id="remote_based" 
            value="1" 
                {{ old('remote_based', $user->remote_based ?? false) ? 'checked' : '' }}>
    </div>

    <!-- Hybrid Based -->
    <div>
        <label for="hybrid_based">Hybrid-Based</label>
        <input 
            type="checkbox" 
            name="hybrid_based" 
            id="hybrid_based" 
            value="1" 
                {{ old('hybrid_based', $user->hybrid_based ?? false) ? 'checked' : '' }}>
    </div>

    <!-- Profile Picture -->
    <div>
        <label for="profile_picture">Profile Picture</label>
        <input 
            type="file" 
            name="profile_picture"
            id="profile_picture"
        >
        @if(isset($user) && $user->profile_picture)
            <img src="{{ asset('storage/' . $user->profile_picture) }}">
        @endif
    </div>

    <!-- CV -->
    <div>
        <label for="cv">CV</label>
        <input 
            type="file" 
            name="cv"
            id="cv"
        >
        @if(isset($user) && $user->cv_path)
            <a href="{{ asset('storage/' . $user->cv_path) }}" target="_blank">Download CV</a>
        @endif
    </div>

    <!-- Cover Letter -->
    <div>
        <label for="cover_letter">Cover Letter</label>
        <input 
            type="file" 
            name="cover_letter"
            id="cover_letter"
        >
        @if(isset($user) && $user->cover_letter)
            <a href="{{ asset('storage/' . $user->cover_letter) }}" target="_blank">Download Cover Letter</a>
        @endif
    </div>

    <!-- Department Select -->
    <div>
        <label for="department_id">Department</label>
        <select
            name="department_id"
            id="department_id"
            class="form-control"
        >
            <option value="">Select a Department</option>
            @foreach($departments as $department)
                <option
                    value="{{ $department->id }}"
                        {{ old('department_id', $user->department_id ?? '') == $department->id ? 'selected' : '' }}
                >
                    {{ $department->name}}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Role Select -->
    <div>
        <label for="role_id">Role</label>
        <select
            name="role_id"
            id="role_id"
        >
            <option value="">Select a Role</option>
        </select>
    </div>

    <!-- Seniority Select -->
    <div>
        <label for="seniority_id">Seniority</label>
        <select
            name="seniority_id"
            id="seniority_id"
        >
            <option value="">Select a Seniority</option>
        </select>
    </div>

    <!-- Job Select -->
    <div>
        <label for="job_id">Job</label>
        <select
            name="job_id"
            id="job_id"
        >
            <option value="">Select a Job</option>
        </select>
    </div>

    <!-- Holiday Entitlement Select -->
    <div>
        <label for="holiday_entitlement_id">Holiday Entitlement</label>
        <select
            name="holiday_entitlement_id"
            id="holiday_entitlement_id"
        >
            <option value="">Select a Holiday Entitlement</option>
        </select>
    </div>

    <!-- Contact Select -->
    <div>
        <label for="contact_id">Contact</label>
        <select
            name="contact_id"
            id="contact_id"
        >
            <option value="">Select a Contact</option>
        </select>
    </div>

    <!-- Submit Button -->
    <button type="submit">{{ isset($user) ? 'Update ' . $user->name : 'Create' }}</button>
</form>