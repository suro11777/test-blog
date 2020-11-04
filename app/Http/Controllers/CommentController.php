<?php


namespace App\Http\Controllers;


use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends BaseController
{

    /**
     * CommentController constructor.
     * @param CommentService $commentService
     */
    public function __construct(CommentService $commentService)
    {
        $this->baseService = $commentService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => 'validation error', 'data' => $validator->errors()->messages()]);
        }

        $comment = $this->baseService->addComment($request->all());
        return response()->json(['status' => 202, 'message' => 'create comment', 'data' => $comment]);
    }
}
