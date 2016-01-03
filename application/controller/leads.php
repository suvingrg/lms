<?php

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

      require APP . 'view/_templates/header.php';
      require APP . 'view/_templates/sidebar.php';
      require APP . 'view/leads/add.php';
      require APP . 'view/_templates/footer.php';
    }

    public function addLead()
    {
        if (isset($_POST["submit_add_lead"])) {
            // do addLead() in model/model.php
            $this->model->addLead($_POST["name"], $_POST["address"], $_POST["contact"], $_POST["nextfollowup"]);
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
        // if we have an id of a song that should be edited
        if (isset($l_id)) {
            // do getSong() in model/model.php
            $lead = $this->model->getLead($l_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $song easily
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
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_update_lead"])) {
            // do updateSong() from model/model.php
            $this->model->updateLead($_POST["l_name"], $_POST["address"], $_POST["contact"], $_POST["next_followup"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'leads/view');
    }

}
