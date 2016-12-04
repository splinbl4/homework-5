<?php
session_start();

class Model_Login extends Model
{

    public function get_data()
    {
        $arr = ['login' => $_POST['login'],
            'password' => $_POST['password'],
        ];
        return $arr;
    }

    public function check_authorization()
    {
        if (isset($_POST['submit1'])) {
            $errors = [];
            $login = $_POST['login'];
            $password = $_POST['password'];

            if (Validation::check_login($login) == false) {
                $errors[] = 'Введите логин!';
            }

            if (Validation::check_password($password) == false) {
                $errors[] = 'Введите пароль!';
            }

            if (!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
                $errors[] = 'Логин может состоять только из букв английского алфавита и цифр';
            }

            if (empty($errors)) {
                $records = User::where('login', $login)->first();
                if ($login != $records->login or $password != $records->password) {
                    echo $errors[] = 'Логин или пароль неверный';
                } else {
                    $_SESSION['login'] = $records->login;
                    $_SESSION['id'] = $records->id;
                    echo 'Вы успешно вошли на сайт!<br>';
                    echo 'Перейдите на <a href="main">Главную страницу</a>';
                    exit();
                }
            } else {
                echo $errors[0];
            }

        }
        return true;

    }
}