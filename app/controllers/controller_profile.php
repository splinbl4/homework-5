<?php


class Controller_Profile extends Controller
{
    function __construct()
    {
        $this->model = new Model_Profile();
        $this->view = new View();
    }

    public function action_index()
    {
        $this->model->add_data();
        $this->model->add_file();
        $data = $this->model->get_data();

        $this->view->generate('profile_view.twig', array('data' => $data));
    }
}