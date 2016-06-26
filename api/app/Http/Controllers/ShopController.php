<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;

class ShopController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $points = $user->points;

        $premium = $user->premium;

        if($points < 2)
        {
            $message = "Vous ne dispossez pas d'assez de point";
            return Response::json(compact('message', 'premium'), 200, [], JSON_NUMERIC_CHECK);
        }

        if($premium == 1)
        {
           $message = "Vous disposez déjà d'un compte premium";
           return Response::json(compact('message', 'premium'), 200, [], JSON_NUMERIC_CHECK);
        }

        $user->points = $points -2;

        $user->premium = 1;

        $user->date_premium = Carbon::now();

        $user->save();

        $message = 'Le Cv a été mit en avant !';

        return Response::json(compact('message', 'premium'), 200, [], JSON_NUMERIC_CHECK);
   }

   public function show()
   {

   }
}
