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
class Top extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/sidebar.php';
        require APP . 'view/top/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add() {

      require APP . 'view/_templates/header.php';
      require APP . 'view/_templates/sidebar.php';
      require APP . 'view/top/add.php';
      require APP . 'view/_templates/footer.php';
    }

    public function addCounsellor()
    {
        if (isset($_POST["submit_counsellor"])) {
          //print_r($_POST); exit;
          $this->model->newCounsellor($_POST["c_name"], $_POST["usrname"], $_POST["pwd"]);
        }

        header('location: ' . URL . 'top/index');
    }

    public function view() {

      $counsellors = $this->model->getAllCounsellors();

      require APP . 'view/_templates/header.php';
      require APP . 'view/_templates/sidebar.php';
      require APP . 'view/top/view.php';
      require APP . 'view/_templates/footer.php';
    }

    public function update($c_id)
    {
        if (isset($c_id)) {

            $counsellor = $this->model->getCounsellor($c_id);

            require APP . 'view/_templates/header.php';
            require APP . 'view/_templates/sidebar.php';
            require APP . 'view/top/update.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to songs index page (as we don't have a song_id)
            header('location: ' . URL . 'top/view');
        }
    }

    public function updateCounsellor()
    {

        if (isset($_POST["submit_update_counsellor"])) {

            $this->model->updateCounsellor($_POST["c_name"], $_POST["usrname"], $_POST["pwd"], $_POST['c_id'], $_POST['a_id']);
        }

        // where to go after song has been added
        header('location: ' . URL . 'top/view');
    }


}
