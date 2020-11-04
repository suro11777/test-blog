<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{

    /**
     *
     */
    public function run()
    {
        factory(\App\Models\Article::class)
            ->times(20)
            ->create()
        ->each(function ($article){
            $article->tags()->createMany(
                factory(\App\Models\Tag::class, 3)->make()->toArray()
            );
        });
    }

}
