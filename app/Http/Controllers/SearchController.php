<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class SearchController extends Controller
{
    public function searchByTag($name)
    {
    	$tag = Tag::where('name', $name)->first();

     	$articles = $tag->articles->sortByDesc('published_at');

    	return view('search', compact(['articles']));

    }

    public function searchByAuthor($name)
    {
    	$user = User::where('name', $name)->first();

     	$articles = $user->articles->sortByDesc('published_at');

    	return view('search', compact(['articles']));

    }
}
