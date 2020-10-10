<?php

namespace App\Models;

use App\models\Event;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'exhibition_id',
        'post_id',
        'praised_id',
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
     * Each Image belongs to one Post
     */
    public function post() {
        return $this->belongsTo(Post::class);
    }

    /**
     * Each Image belongs to one event
     */
    public function exhibition() {
        return $this->belongsTo(Exhibition::class);
    }

    /**
     * Each Image belongs to one praised
     */
    public function praised() {
        return $this->belongsTo(Praised::class);
    }
}
