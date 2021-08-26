<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {

        return $this->hasMany(Post::class);
        
    }

    public function role() {


        return $this->belongsTo(Role::class);
        
    }
    
    public function scopeGetById($query, $id) {

		return $query->where('id', $id)->get();

	}

    public function scopeGetUserPosts($query) {

		//return $query->with('posts')->where('id', 1)->first()->posts()->first();
        return $query->whereHas('posts', function (Builder $query) {
			$query->where('id', 2);
		});

	}
}
