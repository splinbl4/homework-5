<?php
session_start();
class Model_Users extends Model
{
    public $type;
    public $age;
    public function get_data()
    {
        $sql = "SELECT name, age, description FROM user";
        $result = self::$connection->query($sql);
        while ($record = mysqli_fetch_assoc($result)) {
            if ($record['age'] < 18) {
                $record['age'] .= ' (Несовершеннолетний)';
            } else {
                $record['age'] .= ' (Совершеннолетний)';
            }
            $arr[] = $record;
        }
        return $arr;
    }
}