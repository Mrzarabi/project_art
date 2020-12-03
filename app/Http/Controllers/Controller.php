<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function upload_image($image)
    {
        $date = Carbon::now();
        $imagePath = "/upload/images/{$date->year}/{$date->month}/{$date->day}/";
        $filename = $image->getClientOriginalName();
        $filename = Carbon::now()->timestamp . "-{$filename}";
        $image->move(public_path($imagePath) , $filename);
        $file = $imagePath . $filename;
        return $file;
    }

    public static function unlink_image($id) 
    {
        $filename = Image::find( $id );
        $path = public_path($filename->image);
        return $path;
    }

    public static function unlink_image_from_path($path)
    {
        $path = public_path($path);
        return $path;
    }
}
