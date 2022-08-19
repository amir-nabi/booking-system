<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use App\Rules\isWeekend;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
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
            'name.required' => 'Full name is required.',
            'phone.required' => 'Phone number is required.',
            'email.required' => 'E-mail is required.',
            'datetime.required' => 'Please choose a date from here to 2 weeks.',
            'admin_id.required' => 'Please choose your doctor.',
            'expertise_id.required' => 'Please choose a department.',
        ];
    }
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required','email'],
            'phone' => ['required'],
            'datetime' => ['required','date',new DateBetween, new TimeBetween, new isWeekend],
            'admin_id' => ['required'],
            'expertise_id' => ['required'],
        ];
    }
}
