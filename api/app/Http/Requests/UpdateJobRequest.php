<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class UpdateJobRequest extends Request
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
            "user_id"         => "required|exists:users,id",
            "category_id"     => "required",
            "country"         => "required|min:0|max:70",
            "city"            => "required|min:0|max:70",
            "postal_code"     => "required|min:0|max:70",
            "entreprise_desc" => "required|min:0|max:6000",
            "message"         => "required|min:0|max:6000",
            "lang"            => "required|min:0|max:50",
            "graduation"      => "required|min:0|max:50",
            "salary"          => "required|min:0",
        ];
    }



    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
