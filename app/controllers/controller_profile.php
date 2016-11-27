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
        $data = $this->model->add_file();
        $this->model->add_data();
        $this->view->generate('profile_view.php', $data);
    }
}