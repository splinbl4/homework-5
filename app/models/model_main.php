<?php


class Model_Main extends Model
{
    public function get_data()
    {
        session_start();
        unset($_SESSION['login']);
        unset($_SESSION['id']);

    }

}