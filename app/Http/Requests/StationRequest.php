<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Response;
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
                $imageValidation=['nullable','mimes:jpg,png'];
            }
        }else{
            $imageValidation=['nullable','mimes:jpg,png'];
        }

        return [
            //
            'name' => 'required',
            'call_letters' => 'required',
            'frequency' => 'required',
            'format' => 'required',
            'streaming_player' => 'required|url',
            'website' => 'required|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
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
            'name.required' => 'Enter station name',
            'call_letters.required' => 'Enter station call letter',
            'frequency.required' => 'Enter station frequency',
            'format.required' => 'Select station format',
            'streaming_player.required' => 'Enter link to streaming player',
            'streaming_player.url' => 'Enter valid link to streaming player',
            'website.required' => 'Enter link to station website',
            'website.url' => 'Enter valid link to station website',
            'facebook.url' => 'Enter valid link to facebook',
            'twitter.url' => 'Enter valid link to twitter',
            'instagram.url' => 'Enter valid link to instagram',
            'phone.required' => 'Enter station phone number',
            'phone.numeric' => 'Enter valid station phone number',
            'email.required' => 'Enter station email',
            'email.unique' => 'Entered email already exists',
            'email.regex' => 'Enter valid email',
            'logo.required' => 'Upload station logo',
            'logo.mimes' => 'Logo must be a file type:jpg,png',
        ];
    }

        public function failedValidation(Validator $validator){
            if(\Request::is('api/*')){
                $data=response()->json($validator->errors(),422);
                throw new HttpResponseException($data);
            }
            else{
                return parent::failedValidation($validator);
            }
        
            
        }

  
}
