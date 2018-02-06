<?php

namespace App\Controller;

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

    /**
     * @param array $json
     */
    public function responseJson(array $json)
    {
        header('Content-Type: application/json');
        echo json_encode($json);
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
}
