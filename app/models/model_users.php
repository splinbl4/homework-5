<?php
session_start();
class Model_Users extends Model
{
    public function get_data()
    {
        $record = User::all();
        foreach ($record as $user) {
            if ($user['age'] < 18) {
                $user['age'] .= ' (Несовершеннолетний)';
            } else {
                $user['age'] .= ' (Совершеннолетний)';
            }
            $arr[] = $user;
        }
        return $arr;
    }
}