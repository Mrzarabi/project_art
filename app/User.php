<?php

namespace App;

use App\models\Event;
use App\Models\Exhibition;
use App\Models\Post;
use App\Models\Praised;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar',
        'name',
        'family',
        'phone_number',
        'i_acc',
        'f_acc',
        'address',
        'desc',
        'email',
        'password',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token',
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
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if ( ! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * Relations
     */
    
    /**
     * Each User can has many posts
     */
    public function posts() {
        return $this->hasMany(Post::class);
    }

    /**
     * Each User can has many events
     */
    public function events() {
        return $this->hasMany(Event::class);
    }

    /**
     * Each User can has many exhibitions
     */
    public function exhibitions() {
        return $this->hasMany(Exhibition::class);
    }

    /**
     * Each User can has many praised
     */
    public function praiseds() {
        return $this->hasMany(Praised::class);
    }
}
