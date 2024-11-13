<form action="{{ isset($rota) ? route('rotas.update', $rota->id) : route('rotas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($rota))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <label for="user_id">{{ __('rotas.user') }}:</label>
            <select name="user_id" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ isset($rota) && $rota->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->getName() }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="department_id">{{ __('rotas.department') }}:</label>
            <select name="department_id" class="form-control" required>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ isset($rota) && $rota->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <label for="start_time">{{ __('rotas.start_time') }}:</label>
            <input type="datetime-local" name="start_time" class="form-control" value="{{ isset($rota) ? $rota->start_time->format('Y-m-d\TH:i') : old('start_time') }}" required>
        </div>

        <div class="col-md-6">
            <label for="end_time">{{ __('rotas.end_time') }}:</label>
            <input type="datetime-local" name="end_time" class="form-control" value="{{ isset($rota) ? $rota->end_time->format('Y-m-d\TH:i') : old('end_time') }}" required>
        </div>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($rota) ? __('Update') : __('Create') }}</button>
    </div>
</form>
