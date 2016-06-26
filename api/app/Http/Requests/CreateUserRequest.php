<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Input;


class CreateUserRequest extends Request
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
            "login"                 => "unique:users,login|required|max:15",
            "email"                 => "unique:users,email|required|max:255",
            "first_name"            => "required|max:35",
            "last_name"             => "required|max:35",
            "password"              => "required|max:255|confirmed",
            "password_confirmation" => "required|max:255",
            "country"               => "required|max:70",
            "city"                  => "required|max:70",
            "postal_code"           => "required|numeric|max:99999",
            "address_number"        => "required|numeric",
            "address"               => "required|max:70",
        ];
    }


    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
