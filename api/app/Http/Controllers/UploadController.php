<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Response;

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

    /**
     * CV Download
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download(Request $request)
    {
        $id = $request->input('id');
        $destinationPath = 'cv/';
        $fileName = $id . '.pdf';
        $path = $destinationPath . $fileName;
        if (!file_exists($path)) {
            $fileName = 'default.pdf';
            $path = $destinationPath . $fileName;
        }
        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $fileName . '"',
        ]);
    }
}
