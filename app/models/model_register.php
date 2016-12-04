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

            if (Validation::check_email($login, $email) == false) {
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

            } else {
                $errors[] = 'Капча не пройдена';
            }

            $records = User::where('login', $login)->first();
            if ($login != $records->login) {
                $ip = ip2long($remoteIp);
                User::insert(['login' => $login, 'password' => $password, 'user_ip' => $ip]);
            } else {
                $errors[] = 'Такой логин уже существует';
            }

            if (empty($errors)) {
                Mailer::send_mailer($login, $email);
                    echo 'Вы успешно зарегестрировались!<br>';
                    echo "Перейдите на <a href='main'>Главную страницу</a> и авторизуйтесь";
                    exit();
            } else {
                echo $errors[0];
            }
        }
        return true;
    }

}
