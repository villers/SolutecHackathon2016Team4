<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UploadController extends Controller
{
    /**
     * Avatar upload
     * @param Request $request
     */
    public function avatar(Request $request)
    {
        $id = $request->input('id');
        $destinationPath = 'avatar/';

        $user = User::findOrFail($id);

        array_map('unlink', glob("${destinationPath}*_{$id}.*"));

        // Avatar upload
        $file = $request->file('file');
        $fileName = uniqid() . '_' . $id . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        $user->picture = $fileName;

        $user->save();
    }

    /**
     * CV upload
     * @param Request $request
     */
    public function cv(Request $request)
    {
        $id = $request->input('id');

        $pdf = $request->file('pdf');
        $destinationPath = 'cv/';
        $fileName = $id . '.pdf';

        array_map('unlink', glob("${destinationPath}*_{$id}.*"));

        $pdf->move($destinationPath, $fileName);

        $user = User::findOrFail($id);
        $user->cv = $fileName;
        $user->save();
    }
}
