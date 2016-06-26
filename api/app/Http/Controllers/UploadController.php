<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\User;

class UploadController extends Controller 
{
	public function avatar(Request $request)
	{
		$id= $request->input('id');

		//Avatar upload
		$file = $request->file('file');
		$destinationPath = 'avatar/';
		$fileName = $id . '.' . $file->getClientOriginalExtension();
		$file->move($destinationPath, $fileName);

		$user = User::findOrFail($id);

		$user->picture = $fileName;

		$user->save();
	}

	public function cv(Request $request)
	{
		$id= $request->input('id');

		//PDF upload
		$pdf = $request->file('pdf');
		$destinationPath = 'cv/';
		$fileName = $id . '.pdf';
		$pdf->move($destinationPath, $fileName);

		//Add it to bdd
		$user = User::findOrFail($id);
		$user->cv = $fileName;
		$user->save();
	}
}

?>