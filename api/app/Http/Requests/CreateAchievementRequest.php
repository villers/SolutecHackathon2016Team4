<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAchievementRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "login" => "unique:users,login|required|max:15",

        ];
    }



    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
