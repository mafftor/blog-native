<?php

namespace App\Controller;

use App\System\DB;
use PDO;

class CategoryController extends Controller
{
    public function indexAction()
    {
        $this->checkPermission();
        $data['categories'] = $this->getCategories();

        $this->view('admin/category/index', $data);
    }

    public function storeAction()
    {
        $data = [
            'name' => $_POST['name'] ?? null,
        ];

        $result = DB::prepare('INSERT INTO category (name) VALUES (:name)');
        $result->execute($data);

        $this->redirectTo('/category');
    }

    public function showAction($category_id)
    {
        $data['posts'] = $this->getPosts($category_id);
        foreach ($data['posts'] as $key => $post) {
            $data['posts'][$key]->short = $this->strLimit($post->content);
        }

        $data['category'] = DB::query('SELECT * FROM category WHERE id = ' . $category_id . ' LIMIT 1')
            ->fetchObject();

        $this->view('admin/category/show', $data);
    }

    public function editAction($id)
    {
        $data['category'] = DB::query('SELECT * FROM category WHERE id = ' . $id . ' LIMIT 1')
            ->fetchObject();

        $this->view('admin/category/edit', $data);
    }

    public function updateAction()
    {
        $data = [
            'id' => $_POST['id'] ?? null,
            'name' => $_POST['name'] ?? null,
        ];

        $result = DB::prepare('UPDATE category SET name = :name WHERE id = :id');
        $result->execute($data);

        $this->redirectTo('/category');
    }

    public function deleteAction($id)
    {
        DB::query('DELETE FROM category WHERE id = ' . $id);

        $this->redirectTo('/category');
    }

    private function checkPermission()
    {
        if ($this->checkLogin()) {
            if (!$_SESSION['user']['is_admin']) {
                $this->redirectTo('/admin');
            }
        }
    }
}
