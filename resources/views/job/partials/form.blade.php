<form action="{{ isset($job) ? route('job.update', $job->id) : route('job.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($job))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name">{{ __('job.name') }} @if(!isset($job))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="name" id="name"class="form-control" value="{{ old('name', $job->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="code">{{ __('job.code') }}</label>
                <input type="text" name="code" id="code"class="form-control" value="{{ old('code', $job->code ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="description">{{ __('job.description') }}</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $job->description ?? '') }}</textarea>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="expectations">{{ __('job.expectations') }}</label>
                <textarea name="expectations" id="expectations" class="form-control">{{ old('expectations', $job->expectations ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="probation_length">{{ __('job.probation_length') }} @if(!isset($job))<span class="text-danger">*</span>@endif</label>
                <input type="number" name="probation_length" id="probation_length"class="form-control" value="{{ old('probation_length', $job->probation_length ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="salary_range_id">{{ __('job.salary_range') }} @if(!isset($job))<span class="text-danger">*</span>@endif</label>
                <select name="salary_range_id" id="salary_range_id" class="form-control">
                    <option value="" disabled selected>{{ __('job.select_option') }}</option>
                    @foreach($salaryRange as $SR)
                        <option value="{{ $SR->id }}" {{ old('salary_range_id', $job->salary_range_id ?? '') == $SR->id ? 'selected' : '' }}>
                            {{ $SR->lower_range }} - {{ $SR->upper_range }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($job) ? __('job.edit') . ' ' . $job->name : __('job.create') }}</button>
    </div>
</form>