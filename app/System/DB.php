<?php

namespace App\System;

use PDO;
use PDOException;

class DB
{
    /** @var self */
    private static $instance;

    /** @var PDO */
    private static $db;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * @return DB
     */
    public static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return bool
     */
    public static function connect(): bool
    {
        try {
            self::$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return false;
        }

        return true;
    }

    /**
     * Check is blog was installed
     *
     * @return bool
     */
    public static function isInstalled(): bool
    {
        $result = self::$db->query("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'blog';");

        return $result->fetchColumn();
    }

    /**
     * @param $query
     * @return \PDOStatement
     */
    public static function query($query): \PDOStatement
    {
        return self::$db->query($query);
    }

    /**
     * @param $query
     * @return \PDOStatement
     */
    public static function prepare($query): \PDOStatement
    {
        return self::$db->prepare($query);
    }

    /**
     * Get last insert id from database
     *
     * @return string
     */
    public static function lastInsertId(): string
    {
        return self::$db->lastInsertId();
    }
}
