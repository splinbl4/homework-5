<?php
session_start();

class Model_Register extends Model
{
    public function get_data()
    {
        $arr = [ 'login' => $_POST['login'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'password2' => $_POST['password2']
        ];
        return $arr;


    }

    public function reg_user()
    {
        if (isset($_POST['submit'])) {
            $errors = [];
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if (Validation::check_login($login) == false) {
                $errors[] = 'Введите логин!';
            }

            if (!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
                $errors[] = 'Логин может состоять только из букв английского алфавита и цифр';
            }

            if (Validation::check_email($email) == true) {
                Mailer::send_mailer($login, $email);
            } else {
                $errors[] = 'Неправильный e-mail';
            }

            if (Validation::check_password($password) == false) {
                $errors[] = 'Введите пароль!';
            }

            if (isset($password2)) {
                if ($password2 != $password) {
                    $errors[] = 'Повторный пароль введен не верно';
                }
            }

            $remoteIp = $_SERVER['REMOTE_ADDR'];
            $gRecaptchaResponse = $_REQUEST['g-recaptcha-response'];
            $recaptcha = new \ReCaptcha\ReCaptcha('6Lc2Sw0UAAAAAMq4__LlE60nk1lnFZN8vFv7nMNx');
            $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
            if ($resp->isSuccess()) {
                echo 'Вы не робот';
            } else {
                $errors[] = 'Побробуйте еще раз';
            }


            if (empty($errors)) {
                $sql = "SELECT * FROM user WHERE login = '$login'";
                $result = self::$connection->query($sql);
                while ($records = mysqli_fetch_array($result)) {
                    $arr[] = $records['login'];
                }
                $key = array_search($login, $arr);
                if ($key !== 0) {
                    $sql = "INSERT INTO user (login, password) VALUES('$login', '$password')";
                    self::$connection->query($sql);
                    echo 'Вы успешно зарегестрировались!<br>';
                    echo 'Перейдите на Главную страницу и авторизуйтесь';
                    header("location: register");
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
