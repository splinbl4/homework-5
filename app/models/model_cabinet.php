<?php
session_start();

class Model_Cabinet extends Model
{
    public function get_data()
    {
        $id = $_SESSION['id'];
        return $user = User::where('id', $id)->first()->toArray();
    }

    public function get_photo()
    {
        $id = $_SESSION['id'];
        return $user_photo = Photo::all()->where('user_id', $id)->toArray();
    }
}