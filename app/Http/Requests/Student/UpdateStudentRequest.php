<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property mixed id
 * @property mixed student
 */
class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required',  'max:255'],
            'last_name' => ['required',  'max:255'],
            'index_number' => ['required', 'unique:students', 'min:9' , 'max:9'],
            'email' => ['required', 'email', Rule::unique('students')->ignore($this->student->id), 'max:255'],
            'phone' => ['required', 'min:6'],
        ];
    }
}
