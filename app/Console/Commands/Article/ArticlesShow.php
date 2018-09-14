<?php

namespace App\Console\Commands\Article;

use Illuminate\Console\Command;
use App\Article;

class ArticlesShow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:show';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show article table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->error('Articles table');
        $headers = ['id', 'Title', 'published_at', 'views'];

        $articles = Article::all(['id', 'title', 'published_at', 'view'])->toArray();


        $this->table($headers, $articles);

    }
}
