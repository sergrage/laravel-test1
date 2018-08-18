<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Carbon;


use App\Http\Requests\NewArticleRequest;


class IndexController extends Controller
{

    public function index()
    {
        $articles = Article::all();

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
        ]);

        return redirect('/articles');
    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
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



