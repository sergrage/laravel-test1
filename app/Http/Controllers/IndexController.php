<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Support\Facades\Auth;


use App\Http\Requests\ArticleRequest;


class IndexController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth', ['only' => 'store']);
        $this->middleware('auth', ['except' => 'index']);
    }


    public function index()
    {
        // $articles = Article::latest()->get()->paginate(5);
        $tagsList = Tag::pluck('name', 'id')->all();
        $articles = Article::orderBy('published_at', 'desc')->paginate(3);

        return view('welcome', compact(['articles', 'tagsList']));
    }


    public function create()
    {

    }


    public function store(ArticleRequest $request)
    {

        $path = $request['image'] ? $request->file('image')->store('uploads', 'public') : '';
        
        $article = Article::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'published_at' => Carbon::now(),
            'user_id' => Auth::user()->id,
            'image' => $path,
        ]);

        $article->tags()->attach($request->input('tags'));

        if($article->haveImage()){
            $article->resizeImage();    
        }

        flash('Article has been created')->success();

        return redirect('/articles');
    }


    public function show(Article $article)
    {
        //$article = Article::findOrFail($id);
        $tagsList = Tag::pluck('name', 'id')->all();
        $article->increment('view');

        return view('show', compact('article', 'taglist'));
    }


    public function edit(Article $article)
    {
        //$article = Article::findOrFail($id);
        return view('edit', compact('article'));
    }


    public function update(ArticleRequest $request, Article $article)
    {
       //$article = Article::findOrFail($id);
        $article->update([
            'title' => $request['title'],
            'body' => $request['body'],
            'published_at' => $article->published_at,
            ]);

        return redirect('/articles');
    }


    public function destroy(Article $article)
    {

        $article->deleteImage();
        $article->delete();
        return redirect('/articles');
    }
}
