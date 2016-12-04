<?php
use Intervention\Image\ImageManagerStatic as Image;
session_start();
class Model_Profile extends Model
{
    public function get_data()
    {
        session_start();
        $id = $id = $_SESSION['id'];
        if (isset($id)) {
            $user = User::find($id);
        }
       return $user;
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
                $errors[] = 'Имя должно быть не менее 5 символов';
            }

            if (Validation::check_age($age) == false) {
                $errors[] = 'Возраст может быть не меньше 10 и не больше 100';
            }

            if (Validation::check_description($description) == false) {
                $errors[] = 'Описание должно быть не менее 50 символов';
            }

            if (empty($errors)) {
                $user = User::find($id);
                $user->name = $name;
                $user->age = $age;
                $user->description = $description;
                $user->save();
                echo 'Изменения сохранены!<br>';
                //header("location: profile");
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
            $id = $_SESSION['id'];

            if (Validation::check_file($file) == true) {
                move_uploaded_file($file['tmp_name'], $uploadfile);
                Image::make($uploadfile)->resize(480, 480)->save($uploadfile, 100);
                $filename = $file['name'];
                Photo::insert(['filename' => $filename, 'user_id' => $id]);
                header('location: profile');
//                echo 'Файл успешно добавлен';
            }
        }
        return true;
    }
}