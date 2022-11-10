<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['content' => "string", 'photo' => "string"])]
    public function rules(): array
    {
        return [
            'content' => 'required',
            'photo'   => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ];
    }
}
