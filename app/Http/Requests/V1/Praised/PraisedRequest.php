<?php

namespace App\Http\Requests\V1\Praised;

use Illuminate\Foundation\Http\FormRequest;

class PraisedRequest extends FormRequest
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
            'writer' => 'nullable|string',
            'title' => 'nullable|string',
            'desc' => 'nullable|string',
            'body' => 'nullable|string',
            's_link' => 'nullable|string',
            'date' => 'nullable|string',
            'time' => 'nullable|string',
        ];
    }
}
