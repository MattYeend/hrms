<form action="{{ isset($blog) ? route('blogs.update', $blog->id) : route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($blog))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="title">{{ __('blogs.title') }} @if(!isset($blog))<span class="text-danger">*</span>@endif</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="content">{{ __('blogs.content') }} @if(!isset($blog))<span class="text-danger">*</span>@endif</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $blog->content ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="blog_type_id">{{ __('blogs.blog_type') }} @if(!isset($blog))<span class="text-danger">*</span>@endif</label>
                <select name="blog_type_id" id="blog_type_id" class="form-control">
                    <option value="" disabled selected>{{ __('blogs.select_option') }}</option>
                    @foreach($blogTypes as $type)
                        <option value="{{ $type->id }}" {{ old('blog_type_id', $blog->blog_type_id ?? '') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-primary" type="submit">{{ isset($blog) ? __('blogs.edit') : __('blogs.create') }}</button>
    </div>
</form>
