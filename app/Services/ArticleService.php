<?php


namespace App\Services;


use App\Events\IncrementCountWatchEvent;
use App\Models\Article;
use phpDocumentor\Reflection\DocBlock\Tag;

/**
 * Class ArticleService
 * @package App\Services
 */
class ArticleService extends BaseService
{

    /**
     * @param $slug
     * @return mixed
     */
    public function getArticleBySlug($slug)
    {
        $article = Article::where('slug', $slug)->with('comments', 'tags:id,tag')->first();
        return $article;
    }

    /**
     * @return mixed
     */
    public function index($tag_id)
    {
        $columns = [
            "id",
            "title",
            "slug",
            "description",
        ];
        if ($tag_id) {
            $articles = Article::whereHas('tags', function ($q) use ($tag_id) {
                $q->where('tags.id', $tag_id);

            })->paginate(10, $columns);
        }else{
            $articles = Article::paginate(10, $columns);
        }

        return $articles;
    }

    /**
     * @param $id
     * @return bool
     */
    public function addCountLike($id)
    {
        $article = Article::where('id', $id);
        $isUpdate = $article->increment('count_like');
        if (!$isUpdate) {
            return false;
        }
        $articleLikeCount = $article->first(['count_like'])->count_like;
        return $articleLikeCount;
    }

    /**
     * count_watch добавляет с помощью job, чтобы не нагружал sql
     * @param $id
     */
    public function addCountWatch($id)
    {
        event(new IncrementCountWatchEvent($id));
    }

}
