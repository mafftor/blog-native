<?php

namespace App\Controller;

use App\System\DB;
use PDO;

class AuthController extends Controller
{
    /**
     * Registration users
     */
    public function registerAction()
    {
        $this->validate();

        $result = DB::prepare('SELECT * FROM user WHERE username = :username');
        $result->execute(['username' => $_POST['username']]);

        if ($result->rowCount()) {
            $this->responseJson([
                'error' => 'Username has already registered',
            ], 401);
        }

        $data = [
            'username' => $_POST['username'] ?? null,
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ];

        $result = DB::prepare('INSERT INTO user (username, password) VALUES (:username, :password)');
        $result->execute($data);

        $this->responseJson($data);
    }

    /**
     * Login users
     */
    public function loginAction()
    {
        $this->validate();

        $result = DB::prepare('SELECT * FROM user WHERE username = :username');
        $result->execute(['username' => $_POST['username']]);
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $this->responseJson([
                'error' => 'Username or password are wrong',
            ], 401);
        }

        if (!password_verify($_POST['password'], $user['password'])) {
            $this->responseJson([
                'error' => 'Username or password are wrong',
            ], 401);
        }

        unset($user['password']);

        $_SESSION['user'] = $user;

        $this->responseJson($user);
    }

    /**
     * Validate users (username, password)
     */
    private function validate()
    {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $this->responseJson([
                'error' => 'Username or password are empty',
            ], 400);
        }
    }
}
