<form action="{{ isset($contract) ? route('contract.update', $contract->id) : route('contract.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($contract))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name">{{ __('contracts.name') }} @if(!isset($contract))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="name" id="name"class="form-control" value="{{ old('name', $contract->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="start">{{ __('contracts.start') }} @if(!isset($contract))<span class="text-danger">*</span>@endif</label>
                <input type="date" name="start" id="start"class="form-control" value="{{ old('start', $contract->start ?? '') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="end">{{ __('contracts.end') }}</label>
                <input type="date" name="end" id="end" class="form-control" value="{{ old('end', $contract->end ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="licence_id">{{ __('contracts.role') }}</label>
                <select name="licence_id" id="licence_id" class="form-control">
                    <option value="" disabled selected>{{ __('contracts.select_option') }}</option>
                    @foreach($licence as $licences)
                        <option value="{{ $licences->id }}" {{ old('licence_id', $contract->licence_id ?? '') == $licences->id ? 'selected' : '' }}>
                            {{ $contract->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($contract) ? __('contracts.edit') . ' ' . $contract->name : __('contracts.create') }}</button>
    </div>
</form>