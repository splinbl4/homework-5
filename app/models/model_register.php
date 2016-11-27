<?php
session_start();

class Model_Register extends Model
{
    public function get_data()
    {
        if (isset($_POST['submit'])) {
            $errors = [];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if (isset($login)) {
                $login = htmlentities(strip_tags(trim($_POST['login'])), ENT_QUOTES);
                if ($login == '') {
                    $errors[] = 'Введите логин!';
                };
            }
            if (!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
                $errors[] = 'Логин может состоять только из букв английского алфавита и цифр';
            }

            if (isset($password)) {
                $password = htmlentities(strip_tags(trim($_POST['password'])), ENT_QUOTES);
                if ($password == '') {
                    $errors[] = 'Введите пароль!';
                }
            }

            if (isset($password2)) {
                if ($password2 != $password) {
                    $errors[] = 'Повторный пароль введен не верно';
                }
            }
            if (empty($errors)) {
                $sql = "SELECT * FROM user";
                $result = self::$connection->query($sql);
                $records = mysqli_fetch_object($result);
                if ($login != $records->login) {
                    $sql = "INSERT INTO user (login, password) VALUES('$login', '$password')";
                    self::$connection->query($sql);
                    echo 'Вы успешно зарегестрировались!<br>';
                    echo 'Перейдите на Главную страницу и авторизуйтесь';
                } else {
                    echo $errors[] = 'Такой логин уже существует';
                }
            } else {
                echo $errors[0];
            }
        }
        return true;
    }


}
