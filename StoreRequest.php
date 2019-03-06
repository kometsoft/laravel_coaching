<?php

namespace App\Http\Requests\Aduan;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'tajuk' => 'required|min:10',
            'aduan' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'tajuk.required' => 'Sila masukkan tajuk',
            'aduan.required' => 'Sila masukkan aduan',
            'tajuk.min' => 'Sila masukkan sekurang2nya :min aksara',
        ];
    }

}
