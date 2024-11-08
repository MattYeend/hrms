<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() && (Auth::user()->isAdmin() || Auth::user()->isSuperAdmin());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
            'salary' => 'required|integer',
            'first_line' => 'required|string|max:255',
            'second_line' => 'nullable|string|max:255',
            'town' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'county' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'post_code' => 'required|string|max:20',
            'full_or_part' => 'required|string|max:50',
            'region' => 'required|string|max:50',
            'timezone' => 'required|string|max:50',
            'dark_mode' => 'boolean',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'office_based' => 'nullable|integer',
            'remote_based' => 'nullable|integer',
            'hybrid_based' => 'nullable|integer',
            'department_id' => 'nullable|exists:departments,id',
            'roles_id' => 'nullable|exists:roles,id',
            'seniority_id' => 'nullable|exists:seniorities,id',
            'job_id' => 'nullable|exists:job,id',
            'holiday_entitlement_id' => 'nullable|exists:holiday_entitlements,id',
            'contact_id' => 'nullable|exists:user_contacts,id',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ];
    }
}
