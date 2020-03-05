<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ApiTokenLogin
 * @property-read string $email
 * @property-read string $password
 */
class ApiTokenLogin extends FormRequest
{
    /**
     * {@inheritdoc}
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
            'email' => 'required|string',
            'password' => 'required|string',
        ];
    }
}