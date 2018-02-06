<?php

/**
 * Main application class
 *
 * @author Mafftor <mafftor@gmai.com>
 * @created 04.01.2018
 */

namespace App;

use app\System\DB;

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/System/DB.php';

class App
{
    /** @var \stdClass */
    private $classes;

    /**
     * App constructor.
     */
    public function __construct()
    {
        DB::connect();

        $this->classes = new \stdClass();

        if (!DB::isInstalled()) {
            $this->installation();
        }

        $this->register();
        $this->load();
    }

    /**
     * Install the blog
     */
    private function installation()
    {
        $sql = file_get_contents(__DIR__ . '/Migration/dump.sql');
        DB::query($sql);

        die('Database has been created successfully! Please refresh the page');
    }

    /**
     * Register Controllers and some system files
     *
     * @return bool
     */
    private function register(): bool
    {
        // load base controller
        require_once __DIR__ . '/Controller/Controller.php';


        $items = scandir(__DIR__ . '/Controller');
        foreach ($items as $item) {
            if (strpos($item, 'Controller.php')) {
                if (file_exists(__DIR__ . '/Controller/' . $item)) {
                    require_once __DIR__ . '/Controller/' . $item;
                    $name = ROOT_NAMESPACE . (substr(ROOT_NAMESPACE, -1) === '\\' ? '' : '\\') . str_replace('.php', '', $item);
                    $this->classes->{mb_strtolower(str_replace('Controller.php', '', $item))} = new $name;
                }
            }
        }

        return true;
    }

    /**
     * Load Controller and Action
     */
    private function load()
    {
        $route = explode('/', trim($_GET['route'] ?? ''));

        $class = current($route) ? mb_strtolower(current($route)) : mb_strtolower(DEFAULT_CONTROLLER);
        $function = next($route) ? mb_strtolower(current($route)) : 'index';
        $param = next($route) ? current($route) : null;

        if ($param) {
            return $this->classes->$class->{$function . 'Action'}($param);
        }

        return $this->classes->$class->{$function . 'Action'}();
    }
}
