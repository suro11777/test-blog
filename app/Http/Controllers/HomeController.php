<?php


namespace App\Http\Controllers;


use App\Services\HomeService;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends BaseController
{

    /**
     * HomeController constructor.
     * @param HomeService $homeService
     */
    public function __construct(HomeService $homeService)
    {
        $this->baseService = $homeService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = $this->baseService->index();
        return view('welcome', compact('articles'));
    }
}
