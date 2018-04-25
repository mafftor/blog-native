<?php

namespace App\Controller;

use App\System\DB;
use PDO;

class Controller
{
    /**
     * @param $view
     * @param array $data
     * @throws \Exception
     */
    public function view($view, $data = [])
    {
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/views/$view.php")) {
            throw new \Exception("The view '$view' was not found");
        }

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                global $$key;
                $$key = $value;
            }
        }

        require_once $_SERVER['DOCUMENT_ROOT'] . "/views/$view.php";
    }

    public function redirectTo($to)
    {
        header('Location: ' . $to);
        exit();
    }

    /**
     * @param array $json
     * @param int $code
     */
    public function responseJson(array $json, int $code = 200)
    {
        header('Content-Type: application/json', http_response_code($code));
        echo json_encode($json);
        exit();
    }

    /**
     * @param $value
     * @param int $limit
     * @return string
     */
    public function strLimit($value, $limit = 100): string
    {
        if (mb_strwidth($value, 'UTF-8') <= $limit) {
            return $value;
        }

        return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . '...';
    }

    /**
     * Get all posts
     *
     * @param int|null $category_id
     * @return array
     */
    public function getPosts(int $category_id = null): array
    {
        return DB::query('SELECT p.*, COUNT(pc.post_id) AS pc_count FROM post AS p LEFT JOIN post_comment AS pc ON p.id = pc.post_id ' . ($category_id ? 'WHERE p.category_id = ' . $category_id : '') . ' GROUP BY p.id ORDER by created_at DESC')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get all categories
     *
     * @return array
     */
    public function getCategories(): array
    {
        return DB::query('SELECT * FROM category ORDER by id DESC')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get popular posts by comments
     *
     * @return array
     */
    public function getPopularPosts(): array
    {
        $latestPosts = DB::query('SELECT p.*, COUNT(pc.post_id) AS pc_count FROM post AS p LEFT JOIN post_comment AS pc ON p.id = pc.post_id GROUP BY p.id ORDER BY pc_count DESC limit 5');
        return $latestPosts->fetchAll(PDO::FETCH_OBJ);
    }

    public function isLogged()
    {
        return !empty($_SESSION['user']);
    }

    public function checkLogin()
    {
        if (!$this->isLogged()) {
            $this->redirectTo('/admin/login');
        }

        return true;
    }
}
