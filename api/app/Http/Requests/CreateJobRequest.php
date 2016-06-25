<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class CreateJobRequest extends Request
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
            "user_id" => "required",
            "category_id" => "required",
            "country" => "required|max:70",
            "city" => "required|max:70",
            "postal_code" => "required|max:70",
            "entreprise_desc" => "required|max:6000",
            "message" => "required|max:6000",
            "lang" => "required|max:50",
            "graduation" => "required|max:50",
            "salary" => "required",
        ];
    }



    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
