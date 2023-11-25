<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'projectname' => 'required|string',
            'description' => 'string',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ];
    }

    public function message() {
        return [
            'projectname.required' => '',
            'description' => '',
            'start_date.required' => '',
            'endDate.required' => '',
        ];
    }
}
