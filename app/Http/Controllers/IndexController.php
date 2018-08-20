<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Support\Facades\Auth;


use App\Http\Requests\NewArticleRequest;


class IndexController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth', ['only' => 'store']);
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index()
    {
        $articles = Article::latest()->get();

        return view('welcome', compact('articles'));
    }


    public function create()
    {

    }


    public function store(NewArticleRequest $request)
    {

        $article = Article::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'published_at' => Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/articles');
    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
        $article->increment('view');

        return view('show', compact('article'));
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('edit', compact('article'));
    }


    public function update(NewArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update([
            'title' => $request['title'],
            'body' => $request['body'],
            'published_at' => $article->published_at,
            ]);

        return redirect('/articles');
    }


    public function destroy($id)
    {
        //
    }
}



