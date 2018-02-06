<?php

namespace App\Controller;

use App\System\DB;

class CommentController extends Controller
{
    public function storeAction()
    {
        $data = [
            'post_id' => $_POST['post_id'] ?? null,
            'author' => $_POST['author'] ?? null,
            'comment' => $_POST['comment'] ?? null,
        ];

        $result = DB::prepare('INSERT INTO post_comment (post_id, author, comment) VALUES (:post_id, :author, :comment)');
        $result->execute($data);

        $data += [
            'created_at' => date('d M H:i'),
        ];

        $this->responseJson($data);
    }
}
