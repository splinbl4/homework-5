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
        $data = $this->model->get_data();
        $data1 = $this->model->get_photo();
        $this->view->generate('cabinet_view.php', $data, $data1);
    }
}