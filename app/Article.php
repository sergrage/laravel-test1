<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbor;
//use Cviebrock\EloquentSluggable\Sluggable;

use Intervention\Image\ImageManagerStatic as Image;

use App\User;

class Article extends Model
{

   // use Sluggable;


    protected $fillable = ['title', 'body', 'published_at', 'user_id', 'image'];

// Чтобы своя дата 'published_at' работала как экземпляр Carbon.
    protected $dates = ['published_at'];

    // public function sluggable()
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }


    public function publishedAtForHumans()
    {
    	return $this->published_at->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function limit()
    {
        return str_limit($this->body, 50, '...');
    }

    public function haveImage()
    {
        if(!$this->image){
            return false;
        }

        return true;
    }

    public function resizeImage()
    {
        
        // open and resize an image file
        $img = Image::make('storage/' . $this->image);

        $img->resize(540, null, function ($constraint) {
             $constraint->aspectRatio();
        });

        // save file as jpg with medium quality
        $img->save('storage/' . $this->image, 60);

    }
}
