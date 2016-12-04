<?php
use Illuminate\Database\Capsule\Manager as Capsule;
require 'vendor/autoload.php';

$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'bd',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

class User extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'users';
    public $timestamps = false;
}

class Photo extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'photos';
    public $timestamps = false;
}
