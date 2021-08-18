<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'site_name' => [
                'required', 'alpha_spaces'
            ],
            'site_logo' => [
                'nullable','mimes:jpg,jpeg,png','max:1024'
            ],
            'admin_email' => [
                'required', 'email'
            ],
            'date_format' => [
                'required'
            ],
            'date_time_format' => [
                'required'
            ],
            'time_format' => [
                'required'
            ],
            'entries_per_page' => [
                'required'
            ],
        ];
    }
}
