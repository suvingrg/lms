<?php
session_start();

class Reports extends Controller
{

  public function counsellor() {

    $leads= $this->model->getAllLeads();

    require APP . 'view/_templates/header.php';
    require APP . 'view/_templates/sidebar.php';
    require APP . 'view/reports/counsellor.php';
    require APP . 'view/_templates/footer.php';
  }

  public function counsellorReport() {

    if (isset($_POST["done"])) {
      $leads= $this->model->counsellorReport($_POST["c_name"]);
    }

    require APP . 'view/_templates/header.php';
    require APP . 'view/_templates/sidebar.php';
    require APP . 'view/reports/counsellor.php';
    require APP . 'view/_templates/footer.php';
  }

  public function activeLeads() {

    $leads = $this->model->getActiveLeads();

    require APP . 'view/_templates/header.php';
    require APP . 'view/_templates/sidebar.php';
    require APP . 'view/reports/activeleads.php';
    require APP . 'view/_templates/footer.php';
  }

  public function status() {

    $leads = $this->model->getActiveLeads();

    require APP . 'view/_templates/header.php';
    require APP . 'view/_templates/sidebar.php';
    require APP . 'view/reports/status.php';
    require APP . 'view/_templates/footer.php';
  }

  public function statusReport()
  {
    if (isset($_POST["done"])) {
      $leads= $this->model->statusReport($_POST["status"]);
    }

    require APP . 'view/_templates/header.php';
    require APP . 'view/_templates/sidebar.php';
    require APP . 'view/reports/status.php';
    require APP . 'view/_templates/footer.php';

  }

  public function customized() {

    $counsellors = $this->model->getCounsellors();
    $leads = $this->model->getAllLeads();

    require APP . 'view/_templates/header.php';
    require APP . 'view/_templates/sidebar.php';
    require APP . 'view/reports/customized.php';
    require APP . 'view/_templates/footer.php';
  }

  public function customizedReport() {

    if (isset($_POST["done"])) {
      $leads= $this->model->customizedReport($_POST["c_name"], $_POST["dated"], $_POST["semester"]);
      $counsellors = $this->model->getCounsellors();
    }

    require APP . 'view/_templates/header.php';
    require APP . 'view/_templates/sidebar.php';
    require APP . 'view/reports/customized.php';
    require APP . 'view/_templates/footer.php';
  }


}
