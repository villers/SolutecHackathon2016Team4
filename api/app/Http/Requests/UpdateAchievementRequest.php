<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Input;

class UpdateAchievementRequest extends Request
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
            "message" => "required|min:0|max:50",
            "points"  => "required|min:0|numeric",
            "icon"    => "required|min:0|max:25",
        ];
    }



    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
