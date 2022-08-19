<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpertiseStoreRequest extends FormRequest
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
            'name.required' => 'The title is required',
            'price.required' => 'The price is required',
            'description.required' => 'The description is required',
        ];
    }
    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ];
    }
}
