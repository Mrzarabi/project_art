<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Praised extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'body',
        's_link',
        'date',
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
