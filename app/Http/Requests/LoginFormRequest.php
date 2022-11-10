<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class LoginFormRequest extends FormRequest
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

    #[ArrayShape(['email' => "string", 'password' => "string"])]
    public function attributes(): array
    {
        return [
            'email' => 'E-mail',
            'password' => 'Password'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['email' => "string[]", 'password' => "string[]"])]
    public function rules(): array
    {
        return [
            'email'    => ['required', 'email'],
            'password' => ['required']
        ];
    }
}
