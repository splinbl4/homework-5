<?php
session_start();
class Model_Profile extends Model
{
    public function get_data()
    {
        session_start();
        if (isset($_SESSION['id'])) {
            $arr = [ 'name' => $_POST['name'],
            'age' => $_POST['age'],
            'description' => $_POST['description']
            ];
        }
       return $arr;
    }

    public function add_data()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $description = $_POST['description'];
            $id = $_SESSION['id'];
            $errors = [];

            if (Validation::check_name($name) == false) {
                $errors[] = 'Введите имя!';
            }

            if (Validation::check_age($age) == false) {
                $errors[] = 'Введите возраст!';
            }

            if (Validation::check_description($description) == false) {
                $errors[] = 'Пару слов о себе!';
            }

            if (empty($errors)) {
                $sql = "SELECT * FROM user WHERE id = '{$_SESSION['id']}'";
                $result = self::$connection -> query($sql);
                mysqli_fetch_array($result);
                $sql1 = "UPDATE user SET name = '$name', age = '$age', description = '$description' WHERE id = '$id'";
                self::$connection->query($sql1);
                echo 'Изменения сохранены!</a><br>';
            } else {
                echo $errors[0];
            }
        }
        return true;
    }

    public function add_file()
    {
        if (isset($_POST['submit3'])) {
            $file = $_FILES['file'];
            $uploaddir = 'photos/';
            $uploadfile = $uploaddir . basename($file['name']);

            if (Validation::check_file($file) == true) {
                move_uploaded_file($file['tmp_name'], $uploadfile);
                $filename = $file['name'];
                $id = $_SESSION['id'];
                $sql = "INSERT INTO photos (filename, user_id) VALUES ('$filename', '$id')";
                self::$connection -> query($sql);
                echo 'Файл успешно добавлен';
                header("location: profile");
            }
        }
        return true;
    }
}