<?php

session_start();
class Controller_Main extends Controller
{

    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
    }

    public function action_index()
    {
        if (isset($_SESSION['id'])) {
            $data = $this->model->get_data();
            $this->view->generate('auth_view.twig', array('data' => $data));
        } else {
            $this->view->generate('main_view.twig');
        }
//        $this->model = new Model_Main();
//        $this->model->get_data();
    }
}