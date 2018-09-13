<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\User;
use App\Tag;

class ArticleSeeder extends Seeder
{

    public function run()
    {
    	$tags = Tag::all();
    	// создаем статью и для каждой используя связь $article->tags() передаем 
    	// от 1 до 3 id тэгов
        factory(Article::class, 1)->create()->each(function($article) use ($tags) {
         	$article->tags()->attach( $tags->random(rand(1, 3))->pluck('id')->toArray());
    	});
	}
}
