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
            $_SESSION['usrname'] = "Counsellor";
            header('location: ' . URL . 'leads/index');
          }
          else {
            $_SESSION['usrname'] = "Top Management";
            header('location: ' . URL . 'top/index');
          }
        // $_SESSION['id'] =
        }
        else {
          header('location: ' . URL . 'error/index');
        }
      }

    }

    public function logout()
    {
      if (isset($_POST['logout'])) {
        $this->model->logout($_SESSION['usrname']);
      }
      header('location: ' . URL . 'home/index');
    }

}
