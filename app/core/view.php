<?php
session_start();
class View
{
    function __construct()
    {

    }

    function generate($content_view, $data = null, $data1 = null)
    {
        include_once 'app/views/' . $content_view;
    }
}