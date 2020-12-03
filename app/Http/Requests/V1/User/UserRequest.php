<?php

namespace App\Http\Requests\V1\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'avatar' => [
                'nullable', 'image', 'mimes:jpeg,jpg,png,gif',
            ],
            'name' => 'nullable|string|max:255',
            'family' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            
            'phone_number' => ['nullable', 
                Rule::unique('users')->ignore(request()->route()->parameters['user']), 
            ],

            'i_acc' => 'nullable|string',
            'f_acc' => 'nullable|string',

            'email' => ['required', 
                Rule::unique('users')->ignore(request()->route()->parameters['user']), 
                'string', 'email', 'max:255'
            ],
        ];
    }
}
