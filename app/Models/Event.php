<?php

namespace App\models;

use App\Models\Image;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'title',
        'desc',
        'body',
        'i_link',
        'f_link',
        'date',
        'address',
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
     * Each event can belongs to one user
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
