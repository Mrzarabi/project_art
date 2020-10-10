<?php

namespace App\Http\Requests\V1\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
        //TODO request Image
        return [
            'image' => [
                'nullable', 'image', 'mimes:jpeg,jpg,png,gif',
            ],
            'title' => 'nullable|string',
            'desc' => 'nullable|string',
            'body' => 'nullable|string',
            'i_link' => 'nullable|string',
            'f_link' => 'nullable|string',
            'date' => 'nullable|string',
            'address' => 'nullable|string',
        ];
    }
}
