<?php

namespace App\Controller;

use App\System\DB;
use PDO;

class AdminController extends Controller
{
    /**
     * Registration users
     */
    public function indexAction()
    {
        $this->checkLogin();
        $this->view('admin/index');
    }

    public function loginAction()
    {
        if ($this->isLogged()) {
            $this->redirectTo('/admin');
        }

        $this->view('admin/login');
    }

    public function logoutAction()
    {
        unset($_SESSION['user']);

        $this->checkLogin();
    }
}
