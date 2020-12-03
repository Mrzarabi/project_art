<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Praised extends Model
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

    protected $fillable = [
        'writer',
        'title',
        'slug',
        'desc',
        'body',
        's_link',
        'date',
        'time',
    ];

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
     * Each praised belongs to one user
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Each praised can has many images
     */
    public function images() {
        return $this->hasMany(Image::class);
    }
}
