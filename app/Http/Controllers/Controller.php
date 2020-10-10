<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\ImageManagerStatic as Image;

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
}
