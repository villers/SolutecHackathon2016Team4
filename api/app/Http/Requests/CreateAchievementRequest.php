<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Input;

class CreateAchievementRequest extends Request
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
            "message" => "required|max:50",
            "points" => "required|numeric",
            "icon" => "required|max:25",z
        ];
    }



    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
