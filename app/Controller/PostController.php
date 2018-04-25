<?php

namespace App\Controller;

use App\System\DB;
use PDO;

class PostController extends Controller
{
    public function indexAction()
    {
        $this->checkLogin();
        $data['posts'] = $this->getPosts();
        foreach ($data['posts'] as $key => $post) {
            $data['posts'][$key]->short = $this->strLimit($post->content);
        }

        $data['categories'] = $this->getCategories();

        $this->view('admin/post/index', $data);
    }

    public function storeAction()
    {
        $data = [
            'category_id' => $_POST['category_id'] ?? null,
            'author' => $_POST['author'] ?? null,
            'content' => $_POST['content'] ?? null,
        ];

        $result = DB::prepare('INSERT INTO post (category_id, author, content) VALUES (:category_id, :author, :content)');
        $result->execute($data);

        $this->redirectTo('/post');
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

    public function editAction($id)
    {
        $data['post'] = DB::query('SELECT * FROM post WHERE id = ' . $id . ' LIMIT 1')
            ->fetchObject();

        $data['categories'] = $this->getCategories();

        $this->view('admin/post/edit', $data);
    }

    public function updateAction()
    {
        $data = [
            'id' => $_POST['id'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'author' => $_POST['author'] ?? null,
            'content' => $_POST['content'] ?? null,
        ];

        $result = DB::prepare('UPDATE post SET category_id = :category_id, author = :author, content = :content WHERE id = :id');
        $result->execute($data);

        $this->redirectTo('/post');
    }

    public function deleteAction($id)
    {
        $result = DB::query('DELETE FROM post WHERE id = ' . $id);

        $this->redirectTo('/post');
    }
}
