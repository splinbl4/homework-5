<?php

class Controller_Cabinet extends Controller
{
    function __construct()
    {
        $this->model = new Model_Cabinet();
        $this->view = new View();
    }

    public function action_index()
    {
        $data1 = $this->model->get_data();
        $data2 =$this->model->get_photo();
        $data = array_merge($data1, $data2);
        $this->view->generate('cabinet_view.twig', array('data' => $data));
    }
}