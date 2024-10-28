<?php

namespace App\Http\Controllers;

use App\Models\files;
use App\Supports\Helper;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    use Helper;

    public function upload(Request $request){

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $size = $file->getSize();
            $filePath = "app/public/uploads";
            $file->move(storage_path($filePath), $name);

            $files = files::create([
                'name' =>"/uploads/$name" ,
                'extension' => $extension,
                'size' => $size,
            ]);


            return $this->returnData(2000, $files);
        }
    }
}
