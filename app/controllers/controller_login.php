<?php
session_start();
class Controller_Login extends Controller
{
    function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
    }

    public function action_index()
    {
        $this->model->check_authorization();
        $data = $this->model->get_data();
        $this->view->generate('login_view.twig', array('data' => $data));
    }
}