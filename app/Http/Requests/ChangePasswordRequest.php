<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ChangePasswordRequest extends FormRequest
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
    #[ArrayShape(['currentPassword' => "string", 'newPassword' => "string", 'confirmPassword' => "string"])]
    public function rules(): array
    {
        return [
            'currentPassword' => 'required',
            'newPassword'     => 'required|min:5|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'required|min:5'
        ];
    }
}
