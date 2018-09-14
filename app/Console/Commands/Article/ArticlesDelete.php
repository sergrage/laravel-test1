<?php

namespace App\Console\Commands\Article;

use Illuminate\Console\Command;
use App\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ArticlesDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:delete {year} {month=01} {day=01}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete old articles';

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
        $date = Carbon::create(
            $this->argument('year'),
            $this->argument('month'),
            $this->argument('day'),
             '0','0','0');

        $this->info($date);
        
        $headers = ['id', 'Title', 'published_at', 'views'];

        $articles = Article::all(['id', 'title', 'published_at', 'view'])
                    ->where('published_at', '<', $date);
                    
        $articlesArray = $articles->toArray();

        if(empty($articlesArray)) {
            $this->error('No articles to delete');
            return;
        }

        $articlesIds = $articles->pluck('id');
        
        //dd($articlesIds);
        // if(Carbon::now() > Carbon::now()->subHours(24))  {
        //     echo 123456;
        // }

        $this->table($headers, $articlesArray);

        $name = $this->choice("<question>You realy won't to delete this articles? (Yes/No)</question>", ['yes', 'no'], 1);

        if($name == 'yes'){
            DB::table('articles')->whereIn('id', $articlesIds)->delete();
        }

        $this->call('articles:show');

        return;
    }
}
