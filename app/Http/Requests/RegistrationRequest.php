<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
        $id = $this->id;
        return [
            'frName'    => 'required|string|regex:/^[\x{0621}-\x{064A} ]+$/u|max:255',
            'lsName' => 'required|string|regex:/^[\x{0621}-\x{064A} ]+$/u|max:255',
            'phone' => 'required|string|max:15|unique:users,phone,except,' . $id,
            'country_id'    => 'required|exists:countries,id',
            'password'=> 'required|confirmed',

            'gender'    => 'required|in:1,2',
            'religion_id'    => 'required|numeric|exists:religions,id',
            'phone_Code' => 'required|string|',
            'birth_date'    => 'required|date:before,now()'
        ];
    }
}
