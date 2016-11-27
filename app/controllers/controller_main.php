<?php


class Controller_Main extends Controller
{
    public function action_index()
    {
        if (isset($_SESSION['login']) and isset($_SESSION['id'])) {
            $this->view->generate('auth_view.php');
        } else {
            $this->view->generate('main_view.php');
        }
//        $this->model = new Model_Main();
//        $this->model->get_data();
    }
}