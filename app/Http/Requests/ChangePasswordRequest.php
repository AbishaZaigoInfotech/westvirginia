<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            //
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'old_password.required' => 'Enter old password',
            'new_password.required' => 'Enter new password',
            'confirm_password.required' => 'Enter confirm password'
        ];
    }
}
