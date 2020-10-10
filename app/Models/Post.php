<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'desc',
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
