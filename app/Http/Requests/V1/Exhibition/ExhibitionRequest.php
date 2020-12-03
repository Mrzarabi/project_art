<?php

namespace App\Http\Requests\V1\Exhibition;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'title' => 'nullable|string',
            'body' => 'nullable|string',
            'i_link' => 'nullable|string',
            'f_link' => 'nullable|string',
            's_link' => 'nullable|string',
            'date' => 'nullable|string',
            'address' => 'nullable|string',
        ];
    }
}
