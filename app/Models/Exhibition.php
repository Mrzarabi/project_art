<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'body',
        'i_link',
        'f_link',
        's_link',
        'date',
        'address'
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
     * Each exhibition belongs to one user
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Each exhibition can has many images
     */
    public function images() {
        return $this->hasMany(Image::class);
    }

    /**
     * Each exhibition can has many videos
     */
    public function videos() {
        return $this->hasMany(Video::class);
    }
}
