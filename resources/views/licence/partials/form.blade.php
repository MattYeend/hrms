<form action="{{ isset($licence) ? route('licence.update', $licence->id) : route('licence.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($licence))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name">{{ __('licences.name') }} @if(!isset($licence))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="name" id="name"class="form-control" value="{{ old('name', $licence->name ?? '') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="price">{{ __('licences.price') }} @if(!isset($licence))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="price" id="price"class="form-control" value="{{ old('price', $licence->price ?? '') }}" required>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($licence) ? __('licences.edit') . ' ' . $licence->name : __('licences.create') }}</button>
    </div>
</form>