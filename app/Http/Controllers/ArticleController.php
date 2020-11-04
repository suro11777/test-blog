<?php


namespace App\Http\Controllers;


use App\Services\ArticleService;

class ArticleController extends BaseController
{

    /**
     * ArticleController constructor.
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->baseService = $articleService;
    }

    /**
     * @param string $tag_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($tag_id = '')
    {
        $articles = $this->baseService->index($tag_id);
        return view('article.index', compact('articles'));
    }

    /**
     * @param $slug
     */
    public function getArticleBySlug($slug)
    {
        $article = $this->baseService->getArticleBySlug($slug);
        return view('article.show',compact('article'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCountLike($id)
    {
        $articleLikeCount = $this->baseService->addCountLike($id);
        if (!$articleLikeCount){
            return response()->json(['status' => 404, 'data'=>[]]);
        }
        return response()->json(['status' => 200, 'data'=>$articleLikeCount]);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCountWatch($id)
    {
        $this->baseService->addCountWatch($id);
        return response()->json(['status' => 200, 'message' => 'add event for count watch']);
    }
}
