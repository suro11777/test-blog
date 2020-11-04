<?php


namespace App\Services;


use App\Models\Comment;
use Illuminate\Support\Facades\Log;

/**
 * Class CommentService
 * @package App\Services
 */
class CommentService extends BaseService
{

    /**
     * @param $data
     * @return mixed
     */
    public function addComment($data)
    {
         $comment = Comment::create($data);
         if (!$comment){
             Log::error('dont created comment');
         }
         return $comment;
    }
}
