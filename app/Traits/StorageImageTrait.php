<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait{
    public function storageTraitUpload(Request $request, $fieldName, $folderName){
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.'  . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs(
                'public/' . $folderName . '/' . Auth::user()->id, $fileNameHash);
            $data = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $data;
        }
        return null;
    }
}
