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
                        {{ isset($rotas) && $rotas->user_id == $user->id ? 'selected' : '' }} 
                        data-department="{{ $user->department_id }}">
                        {{ $user->getName() }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="department_id">{{ __('rotas.department') }}:</label>
            <select name="department_id" class="form-control" id="department_id" required>
                <option value="" disabled {{ old('department_id', $rotas->department_id ?? '') === '' ? 'selected' : '' }}>{{ __('rotas.select_option') }}</option>  
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" 
                        {{ isset($rotas) && $rotas->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
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

@push('scripts')
<script>
    $(document).ready(function() {
        function updateUserList() {
            var selectedDepartmentId = $('#department_id').val();
            console.log('Department Selected:', selectedDepartmentId);

            $('#user_id option').each(function() {
                var userDepartmentId = $(this).data('department');
                if (selectedDepartmentId == '' || userDepartmentId == selectedDepartmentId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            var selectedUser = $('#user_id').val();
            if (selectedUser) {
                $('#user_id option[value="' + selectedUser + '"]').show();
            }
        }

        function updateDepartmentList() {
            var selectedUserId = $('#user_id').val();
            console.log('User Selected:', selectedUserId);

            if (selectedUserId) {
                var userDepartmentId = $('#user_id option:selected').data('department');
                $('#department_id').val(userDepartmentId);
            }
        }

        $('#department_id').change(function() {
            updateUserList();
        });

        $('#user_id').change(function() {
            updateDepartmentList();
        });

        updateUserList();
    });
</script>
@endpush
