<?php


class Controller_Register extends Controller
{
    function __construct()
    {
        $this->model = new Model_Register();
        $this->view = new View();
    }

    public function action_index()
    {
        $this->model->reg_user();
        $data = $this->model->get_data();
        $this->view->generate('register_view.twig', array('data' => $data));
    }
}