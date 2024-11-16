<form action="{{ isset($rotas) ? route('rotas.update', $rotas->id) : route('rotas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($rotas))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <label for="user_id">{{ __('rotas.user') }}:</label>
            <select name="user_id" class="form-control" id="user_id" required>
                <option value="" disabled {{ old('user_id', $rotas->user_id ?? '') === '' ? 'selected' : '' }}>{{ __('rotas.select_option') }}</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" 
                        {{ isset($rotas) && $rotas->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->getName() }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <label for="start_time">{{ __('rotas.start_time') }}:</label>
            <input type="datetime-local" name="start_time" class="form-control" 
                value="{{ isset($rotas) ? \Carbon\Carbon::parse($rotas->start_time)->format('Y-m-d\TH:i') : old('start_time') }}" 
                required>
        </div>

        <div class="col-md-6">
            <label for="end_time">{{ __('rotas.end_time') }}:</label>
            <input type="datetime-local" name="end_time" class="form-control" 
                value="{{ isset($rotas) ? \Carbon\Carbon::parse($rotas->end_time)->format('Y-m-d\TH:i') : old('end_time') }}" 
                required>
        </div>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($rotas) ? __('Update') : __('Create') }}</button>
    </div>
</form>
