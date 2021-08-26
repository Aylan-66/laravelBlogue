<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    public function user() {

        return $this->belongsTo(User::class);

    }
    
    public function scopeGetById($query, $id) {

		return $query->where('id', $id)->get();

	}

    public function scopeGetName($query, $id) {

		return $query->with('user')->where('id', $id)->first()->user()->first()->name;

	}

    public function scopeGetUserPosts($query, $id) {

        return $query->whereHas('user', function (Builder $query) use ($id) {
			$query->where('id', $id);
		});

	}
}
