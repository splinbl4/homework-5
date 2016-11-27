<?php

class Validation
{
    public static function check_login($login)
    {
        if (isset($login)) {
            $login = htmlentities(strip_tags(trim($_POST['login'])), ENT_QUOTES);
            if ($login == '') {
                return false;
            }
        }
        return true;
    }

    public static function check_password($password)
    {
        if (isset($password)) {
            $password = htmlentities(strip_tags(trim($_POST['password'])), ENT_QUOTES);
            if ($password == '') {
                return false;
            }
        }
        return true;
    }

    public static function check_name($name)
    {
        if (isset($name)) {
            $name = htmlentities(strip_tags(trim($_POST['name'])), ENT_QUOTES);
            if ($name == '') {
                return false;
            }
        }
        return true;
    }

    public static function check_age($age)
    {
        if (isset($age)) {
            $age = htmlentities(strip_tags(trim($_POST['age'])), ENT_QUOTES);
            if ($age == '') {
                return false;
            }
        }
        return true;
    }

    public static function check_description($description)
    {
        if (isset($description)) {
            $description = htmlentities(strip_tags(trim($_POST['description'])), ENT_QUOTES);
            if ($description == '') {
                return false;
            }
        }
        return true;
    }

    public static function check_file($file)
    {
        if (preg_match('/jpg/', $file['name'])
            or preg_match('/png/', $file['name'])
            or preg_match('/gif/', $file['name'])
            or preg_match('/jpeg/', $file['name'])) {
            if (preg_match('/jpg/', $file['type'])
                or preg_match('/png/', $file['type'])
                or preg_match('/gif/', $file['type'])
                or preg_match('/jpeg/', $file['type'])) {
                return true;
            }
        } else {
            return false;
        }
    }


}