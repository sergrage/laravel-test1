<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbor;

use App\User;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'published_at', 'user_id'];

// Чтобы своя дата 'published_at' работала как экземпляр Carbon.
    protected $dates = ['published_at'];


    public function publishedAtForHumans()
    {
    	return $this->published_at->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
