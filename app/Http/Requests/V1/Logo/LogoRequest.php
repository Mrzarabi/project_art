<?php

namespace App\Http\Requests\V1\Logo;

use Illuminate\Foundation\Http\FormRequest;

class LogoRequest extends FormRequest
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
            'title'         => 'nullable|string|max:50',
            'desc'          => 'nullable|string|max:255',
            'logo'          => [
                'nullable', 'image', 'mimes:jpeg,jpg,png,gif'
            ],
        ];
    }
}
