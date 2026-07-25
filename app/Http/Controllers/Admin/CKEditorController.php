<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|max:5120', // 5 MB
        ]);

        $file = $request->file('upload');

        $filename = time().'_'.$file->getClientOriginalName();

        $path = $file->storeAs(
            'ckeditor',
            $filename,
            'public'
        );

        return response()->json([
            'url' => Storage::url($path)
        ]);
    }
}
