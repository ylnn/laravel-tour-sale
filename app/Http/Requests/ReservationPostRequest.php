<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationPostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "string|required",
            "email" => "required|email",
            "phone" => "string|required",
            "address" => "string|required",
            "pax_count" => "integer|required",
            "pax.*.gender" => "string|required|in:mr,mrs,miss",
            "pax.*.name" => "string",
        ];
    }
}
