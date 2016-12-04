<?php
session_start();
class Model
{
    function __construct()
    {
        require_once 'validation.php';
        require_once '/vendor/autoload.php';
        require_once 'mailer.php';
        require '/config.php';
    }

    public function get_data()
    {

    }
}