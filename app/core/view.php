<?php
session_start();

class View
{

    public $twig;

    function __construct()
    {
        require_once '/vendor/autoload.php';
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('app/views');
        $twig = new Twig_Environment($loader, ['cache' => false]);
        $this->twig = $twig;
    }

    function generate($content_view, $data = [])
    {
//        include_once 'app/views/' . $content_view;
        echo $this->twig->render($content_view, $data);
    }
}