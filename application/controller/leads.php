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
class Leads extends Controller
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
        require APP . 'view/leads/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add() {

      $leads = $this->model->getAllLeads();
      $c_ids = $this->model->getCounsellorIds();

      require APP . 'view/_templates/header.php';
      require APP . 'view/_templates/sidebar.php';
      require APP . 'view/leads/add.php';
      require APP . 'view/_templates/footer.php';
    }

    public function addLead()
    {
        if (isset($_POST["add_lead"])) {
          //print_r($_POST); exit;
          $this->model->addLead($_POST["l_name"], $_POST["address"], $_POST["contact"], $_POST["status"], $_POST["c_id"], $_POST["next_followup"]);
        }

        header('location: ' . URL . 'leads/view');
    }

    public function view() {

      $leads = $this->model->getAllLeads();

      require APP . 'view/_templates/header.php';
      require APP . 'view/_templates/sidebar.php';
      require APP . 'view/leads/view.php';
      require APP . 'view/_templates/footer.php';
    }

    public function update($l_id)
    {
        if (isset($l_id)) {

            $lead = $this->model->getLead($l_id);

            require APP . 'view/_templates/header.php';
            require APP . 'view/_templates/sidebar.php';
            require APP . 'view/leads/update.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to songs index page (as we don't have a song_id)
            header('location: ' . URL . 'leads/view');
        }
    }

    public function updateLead()
    {

        if (isset($_POST["submit_update_lead"])) {

            $this->model->updateLead($_POST["l_name"], $_POST["address"], $_POST["contact"], $_POST["status"], $_POST["next_followup"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'leads/view');
    }

}
