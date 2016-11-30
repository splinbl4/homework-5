<?php

session_start();
class Model_Main extends Model
{
    public function get_data()
    {

        if (isset($_SESSION['login'])) {
            $login = $_SESSION['login'];
            return $login;
        }
    }
}