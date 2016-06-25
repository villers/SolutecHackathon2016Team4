<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\User;

class UploadController extends Controller 
{
	public function upload()
	{
		$id = 2;

		$destinationPath = 'avatar/';

		$base64 = Input::get('base64');

		$imageData = base64_decode($base64);
		$source = imagecreatefromstring($imageData);
		$rotate = imagerotate($source, 0, 0);
		$imageSave = imagejpeg($rotate, $destinationPath.$id.'.jpg',100);
		imagedestroy($source);

		$user = User::findOrFail($id);

		$user->picture = $destinationPath.$id.'.jpg';

		$user->save();
	}
}

?>