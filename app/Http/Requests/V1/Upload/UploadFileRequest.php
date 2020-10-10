<?php

namespace App\Http\Requests\V1\Upload;

use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequest extends FormRequest
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
            'image.*'   => 'image|nullable|mimes:jpeg,png,jpg,gif,svg',
            'videoUrl'  => 'string|nullable',
            'deleteFileImage' => 'string|nullable',
            'deleteFileVideoUrl' => 'string|nullable',
            /**
             * Relations
             */

            'products.*' => 'nullable|integer|exists:products,id',
            'exhibitions.*' => 'nullable|integer|exists:exhibitions,id',
            'praiseds.*' => 'nullable|integer|exists:praised`s,id',
        ];
    }
}
