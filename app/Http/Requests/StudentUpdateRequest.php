<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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

        $userId = Student::find($this->route('student'))?->user_id;

        return [
            'name' => 'sometimes|string',
            'username' => 'sometimes|string|unique:users,username,' . $userId,
            'password' => 'sometimes|string|min:8',
            'role' => 'required|in:admin,super_admin,teacher,student',
            'classroom_id' => 'sometimes|exists:class_rooms,id',
            'birth_date' => 'sometimes|date',
            'parent_name' => 'sometimes|string',
            'parent_number' => 'sometimes|string',
            'address' => 'sometimes|string',
            'status' => 'sometimes|in:active,graduated,transfered,dropped_out',
        ];
    }
}
