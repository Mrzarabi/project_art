<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    // use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    // public function sluggable()
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'body',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relations
     */

    /**
     * Each Post belongs to a User
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Each Post belongs to a Category
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * Each Post can has lots of Images
     */
    public function images() {
        return $this->hasMany(Image::class);
    }

    /**
     * Each Post can has lots of Images
     */
    public function videos() {
        return $this->hasMany(Video::class);
    }
}
