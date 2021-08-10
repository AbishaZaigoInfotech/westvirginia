<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StationRequest extends FormRequest
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
        $imageValidation=['nullable'];
        if($this->route('station')){
            if(!empty(FormRequest::all()['logo'])){
                $imageValidation=['required','mimes:jpg,png'];
            }
        }else{
            $imageValidation=['required','mimes:jpg,png'];
        }
        return [
            //
            'call_letters' => 'required',
            'frequency' => 'required',
            'format' => 'required',
            'streaming_player' => 'required|url',
            'website' => 'required|url',
            'phone' => 'required|numeric',
            'email' => ['required',
                        'regex:/^[a-zA-Z0-9]+@[a-zA-Z]/u',
                        Rule::unique('stations', 'email')->ignore($this->station)
                    ],
            'logo' => $imageValidation,
        ];
    }
    public function messages()
    {
        return[
            'call_letters.required' => 'Enter station call letter',
            'frequency.required' => 'Enter station frequency',
            'format.required' => 'Select station format',
            'streaming_player.required' => 'Enter link to streaming player',
            'streaming_player.url' => 'Enter valid link to streaming player',
            'website.required' => 'Enter link to station website',
            'website.url' => 'Enter valid link to station website',
            'phone.required' => 'Enter station phone number',
            'phone.numeric' => 'Enter valid station phone number',
            'email.required' => 'Enter station email',
            'email.unique' => 'Entered email already exists',
            'email.regex' => 'Enter valid email',
            'logo.required' => 'Upload station logo',
            'logo.mimes' => 'Logo must be a file type:jpg,png',
        ];
    }
}
