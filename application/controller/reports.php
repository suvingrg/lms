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
class Reports extends Controller
{
<<<<<<< HEAD
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
    public function activeLeads()
    {
      $this->model->getActiveLeadReport();

      require APP . 'view/_templates/header.php';
      require APP . 'view/_templates/sidebar.php';
      require APP . 'view/reports/activeleads.php';
      require APP . 'view/_templates/footer.php';
    }
=======

    
>>>>>>> refs/remotes/suvingrg/master
}
