<?php
session_start();

class Home extends Controller
{

    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function login()
    {
      if (isset($_POST["loginSubmit"])) {
        //print_r($_POST); exit;
        $logtype = $this->model->loginVerify($_POST["usrname"], $_POST["pwd"]);
        if (isset($logtype)) {
          if ($logtype == 'counsellor') {
            header('location: ' . URL . 'leads/index');
          }
          else {
            header('location: ' . URL . 'leads/view');
          }
        } else {
          header('location: ' . URL . 'error/index');
        }
        // $_SESSION['id'] =
      }

    }

}
