<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
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
        'desc',
        'image'
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
     * Each Category can has many Children
     */
    public function categories() {
        return $this->hasMany(Category::class);
    }

    /**
     * Get the all category parent.
     */
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Each category can has many products
     */
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
