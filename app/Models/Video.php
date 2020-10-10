<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'videoUrl',
        'exhibition_id',
        'post_id',
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
     * Each Video belongs to the one Post
     */
    public function post() {
        return $this->belongsTo(Post::class);
    }

    /**
     * Each video belongs to the one Exhibition
     */
    public function exhibition() {
        return $this->belongsTo(Exhibition::class);
    }
}
