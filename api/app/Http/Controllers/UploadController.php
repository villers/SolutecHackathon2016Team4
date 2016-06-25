<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Http\Requests;

class UploadController extends Controller 
{

	public function index()
	{
		return view('upload');
	}

	// public function upload(Request $request)
	// {
	// 	$destinationPath = 'avatar';

	// 	if(!file_exists($destinationPath."/".$id))
	// 	{
	// 		mkdir($destinationPath."/".$id, 0777);
	// 	}

	// 	if($request->hasFile('file'))
	// 	{
	// 		$images = $request->file('file');
	// 		$destinationPath = $destinationPath."/".$id;
	// 		$mime = $images->getMimeType();
	// 		$fileName = $id.$images->getClientOriginalName();
	// 		$images->move($destinationPath, $fileName);
	// 	}
	// }
}

?>