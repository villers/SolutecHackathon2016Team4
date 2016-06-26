<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class UpdateNotificationRequest extends Request
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
        "user_id" => "required|exists:users,id",
        "has_read" => "required|min:0",
        "message" => "required|max:6000",
        ];
    }

}
