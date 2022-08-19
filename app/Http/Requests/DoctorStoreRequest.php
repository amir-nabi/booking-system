<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name.required' => 'The full name is required',
            'expertise_id.required' => 'The expertise is required',
            'email.required' => 'The email is required',
            'description.required' => 'The description is required',
            'image.image' => 'The file must be an image'
        ];
    }
    public function rules()
    {
        
        return [
            'name' => ['required'],
            'expertise_id' => ['required'],
            'email' => ['required','email','unique:doctors'],
            'description' => ['required'],
            'image' => ['image'],
        ];
    }

}
