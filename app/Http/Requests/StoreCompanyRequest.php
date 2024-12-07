<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isSuperAdmin();
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
            'pay_day' => 'required|string',
            'active' => 'required|boolean',
            'work_weekends' => 'nullable|boolean',
            'contract_id' => 'nullable|exists:contracts,id',
            'company_contact_id' => 'nullable|exists:company_contacts,id',
            'company_relationship_manager' => 'nullable|exists:users,id',
            'address_book_id' => 'nullable|exists:address_books,id',
        ];
    }
}
