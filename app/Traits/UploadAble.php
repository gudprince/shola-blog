<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Trait UploadAble
 * @package App\Traits
 */
trait UploadAble
{
    /**
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */
    public function uploadOne(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
    {
        //$name = !is_null($filename) ? $filename : str_random(25);

        //return Storage::disk('s3')->put($folder, $file);

        $imageName = time().'.'.$file->extension();  

        $file->move(public_path('storage/'.$folder), $imageName);
        return  asset('storage/'.$folder.'/'.$imageName);
    }

    /**
     * @param null $path
     * @param string $disk
     */
    public function deleteOne($folder = null, $path = null, $disk = 'public')
    {
        //Storage::disk($disk)->delete($path);
        if(file_exists($path)){
            unlink($path);
        }
    }
}
