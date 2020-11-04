<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class IncrementCountWatch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $article_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($article_id)
    {
        $this->article_id = $article_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $article = Article::where('id', $this->article_id);
        if (!$article){
            Log::error('aricle not fount by id:'. $this->article_id);
        }
        $isUpdate = $article->increment('count_watch');
        if (!$isUpdate){
            Log::error('dont increment count watch',[$this->article_id]);
        }
    }
}
