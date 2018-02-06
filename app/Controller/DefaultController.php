<?php

namespace App\Controller;

use App\System\DB;
use PDO;

class DefaultController extends Controller
{
    /**
     * Default action
     */
    public function indexAction()
    {
        $data['posts'] = $this->getPosts();
        $data['popularPosts'] = $this->getPopularPosts();

        foreach ($data['posts'] as $key => $post) {
            $data['posts'][$key]->short = $this->strLimit($post->content);
        }

        foreach ($data['popularPosts'] as $key => $post) {
            $data['popularPosts'][$key]->short = $this->strLimit($post->content);
        }

        $this->view('index', $data);
    }

    /**
     * Get all posts
     *
     * @return array
     */
    private function getPosts(): array
    {
        return DB::query('SELECT * FROM post ORDER by created_at DESC')->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get popular posts by comments
     *
     * @return array
     */
    private function getPopularPosts(): array
    {
        $latestPosts = DB::query('SELECT p.*, COUNT(pc.post_id) AS pc_count FROM post AS p LEFT JOIN post_comment AS pc ON p.id = pc.post_id GROUP BY p.id ORDER BY pc_count DESC limit 5');
        return $latestPosts->fetchAll(PDO::FETCH_OBJ);
    }
}
