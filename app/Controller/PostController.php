<?php

namespace App\Controller;

use App\System\DB;
use PDO;

class PostController extends Controller
{
    public function storeAction()
    {
        $data = [
            'author' => $_POST['author'] ?? null,
            'content' => $_POST['content'] ?? null,
        ];

        $result = DB::prepare('INSERT INTO post (author, content) VALUES (:author, :content)');
        $result->execute($data);

        $data['id'] = DB::lastInsertId();
        $data['content'] = $this->strLimit($data['content']);
        $data += [
            'created_at' => date('d M H:i'),
        ];

        $this->responseJson($data);
    }

    public function showAction($id)
    {
        $post = DB::prepare('SELECT * FROM post WHERE id = :id');
        $post->execute(['id' => $id]);
        $data['post'] = $post->fetchObject();

        $comments = DB::prepare('SELECT * FROM post_comment WHERE post_id = :post_id ORDER by created_at DESC');
        $comments->execute(['post_id' => $id]);
        $data['comments'] = $comments->fetchAll(PDO::FETCH_OBJ);

        if (!$data['post']) {
            throw new \Exception('404! Post not found');
        }

        $this->view('show', $data);
    }
}
