<?php
session_start();
class Model
{
    public static $connection;

    function __construct()
    {
        require_once 'validation.php';
        self::connect_db();
    }

    public static function connect_db()
    {
        self::$connection = @new mysqli('localhost', 'root', '', 'bd');
        if (mysqli_connect_errno()) {
            die(mysqli_connect_error());
        }
        self::$connection -> query('SET NAMES "UTF-8"');
    }

    public function get_data()
    {

    }
}