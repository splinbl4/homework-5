<?php

class Model_Cabinet extends Model
{
    public function get_data()
    {
        session_start();
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = self::$connection->query($sql);
        return mysqli_fetch_array($result);
    }

    public function get_photo()
    {
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM photos WHERE user_id = '$id'";
        $result = self::$connection->query($sql);
        while ($record = mysqli_fetch_object($result)) {
            $arr[] = $record;
        }
        return $arr;
    }
}