<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blogs,slug|max:255',
            'content' => 'required|string',
            'system_level' => 'nullable|integer',
            'company_level' => 'nullable|integer',
            'blog_type_id' => 'required|exists:blog_types,id',
            'author' => 'nullable|exists:users,id',
            'status' => 'nullable|in:draft,published',
            'approval_status' => 'nullable|in:pending,approved,denied',
            'approved_by' => 'nullable|exists:users,id',
        ];
    }
}
