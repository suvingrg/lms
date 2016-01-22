<?php
session_start();
/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Followup extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $leads = $this->model->getAllLeads();
        $c_ids = $this->model->getCounsellorIds();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/sidebar.php';
        require APP . 'view/followup/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addfollowup()
    {
      if (isset($_POST["submit_followup"])) {
          //print_r($_POST); exit;
          $this->model->addFollowup($_POST['l_id'], $_POST["status"], $_POST["feedback"], $_POST["next_followup"], $_POST["c_id"]);
      }

      header('location: ' . URL . 'followup/view');
    }

    public function view() {

      $followups = $this->model->getAllFollowups();

      require APP . 'view/_templates/header.php';
      require APP . 'view/_templates/sidebar.php';
      require APP . 'view/followup/view.php';
      require APP . 'view/_templates/footer.php';
    }
}
