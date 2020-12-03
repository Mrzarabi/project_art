<?php

namespace App\Http\Controllers\Front\V1;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\models\Event;
use App\Models\Post;
use App\Models\Praised;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->take(5)->get();
        $posts = Post::where('category_id' ,1)->latest()->take(12)->get();
        $praiseds = Praised::latest()->take(5)->get();
        $events = Event::latest()->take(3)->get();

        return view('index', [
            'banners' => $banners,
            'events' => $events,
            'posts' => $posts,
            'praiseds' => $praiseds,
        ]);
    }

    public function aboutMe()
    {
        $user = User::where('email', 'rastasafari.art@gmaill.com')->first();
        return view('Layouts.AboutMe.about_me', compact('user'));
    }

}
