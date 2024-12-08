<form action="{{ isset($department) ? route('departments.update', $department->id) : route('departments.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($department))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name">{{ __('departments.name') }} @if(!isset($department))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="name" id="name"class="form-control" value="{{ old('name', $department->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="company_id">{{ __('departments.company') }}</label>
                <select name="company_id" id="company_id" class="form-control">
                    <option value="" disabled selected>{{ __('departments.select_option') }}</option>
                    @foreach($company as $companies)
                        <option value="{{ $companies->id }}" {{ old('company_id', $department->company_id ?? '') == $companies->id ? 'selected' : '' }}>
                            {{ $companies->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="dept_lead_id">{{ __('departments.dept_lead') }}</label>
                <select name="dept_lead_id" id="dept_lead_id" class="form-control">
                    <option value="" disabled selected>{{ __('departments.select_option') }}</option>
                    @foreach($departmentLead as $deptLead)
                        <option value="{{ $deptLead->id }}" {{ old('dept_lead_id', $department->dept_lead_id ?? '') == $deptLead->id ? 'selected' : '' }}>
                            {{ $deptLead->getName() }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($department) ? __('departments.edit') . ' ' . $department->name : __('departments.create') }}</button>
    </div>
</form>