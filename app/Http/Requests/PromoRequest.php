<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromoRequest extends FormRequest
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
        if($this->route('promo')){
            if(!empty(FormRequest::all()['image'])){
                $imageValidation=['nullable','mimes:jpg,png'];
            }
        }else{
            $imageValidation=['nullable','mimes:jpg,png'];
        }
        return [
            //
            'title' => 'required',
            'image' => $imageValidation,
        ];
    }
    public function messages()
    {
        return[
            'title.required' => 'Enter promo title',
            'image.mimes' => 'Image must be a file type:jpg,png',
        ];
    }
}
