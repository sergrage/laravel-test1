<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbor;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'published_at'];

// Чтобы своя дата 'published_at' работала как экземпляр Carbon.
    protected $dates = ['published_at'];


    public function publishedAtForHumans()
    {
    	return $this->published_at->diffForHumans();
    }
}
