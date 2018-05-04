<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BuRequest extends Request
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
            'bu_name'   => 'required|min:5|max:255',
            'bu_price'  => 'required',
            'bu_rent'   => 'required',
            'bu_square' => 'required',
            'bu_type'   => 'required|integer',
            //'bu_small_disc' => 'required|min:10|max:255',
            'bu_meta' => 'required|min:5|max:255',
            'bu_langtuide' => 'required',
            'bu_latituide' => 'required',
            'bu_large_disc' => 'required|min:5',
            //'bu_status' => 'required|integer',
            'rooms_num' => 'required|integer',
            'bath_num' => 'required|integer',
            'image' => 'mimes:png,jpg,jpeg',
            'bu_place' => 'required'
        ];
    }
}
