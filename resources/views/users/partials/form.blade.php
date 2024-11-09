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

    <div>
        <label for="password">Password</label>
        <input 
            type="password" 
            name="password" 
            id="password" 
            {{ isset($user) ? '' : 'required' }}
        >
    </div>

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
</form>