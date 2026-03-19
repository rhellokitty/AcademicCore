<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,super_admin,teacher,student',
            'classroom_id' => 'nullable|exists:class_rooms,id',
            'birth_date' => 'required|date',
            'parent_name' => 'required|string',
            'parent_number' => 'required|string',
            'address' => 'required|string',
            'status' => 'required|in:active,graduated,transfered,dropped_out',
        ];
    }
}
