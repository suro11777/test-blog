<?php


namespace App\Services;


use App\Models\Article;

/**
 * Class HomeService
 * @package App\Services
 */
class HomeService extends BaseService
{

    /**
     * @return mixed
     */
    public function index()
    {
        $columns = [
            "id",
            "title",
            "slug",
            "description",
        ];
        $articles = Article::orderBy('created_at', 'desc')->take(6)->get($columns);
        return $articles;
    }
}
