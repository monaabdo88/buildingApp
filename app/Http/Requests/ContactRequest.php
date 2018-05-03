<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
            'contact_name' => 'required|min:5|max:100',
            'contact_email' => 'required|min:5|max:100|email',
           //'contact_subject' => 'required|min:5',
            'contact_type'=> 'required|integer',
            'contact_msg' =>'required'
        ];
    }
}
