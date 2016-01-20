<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function loginVerify($usrname, $pwd)
    {

      $sql = "SELECT * FROM account";
      $query = $this->db->prepare($sql);
      $query->execute();
      $accounts = $query->fetchAll();
      foreach ($accounts as $account) {
        $a_id = $account->a_id;
        $acc_usrname = $account->usrname;
        $acc_pwd = $account->pwd;
        $type = $account->type;

        if ($usrname == $acc_usrname && $pwd == $acc_pwd) {
          return array($type);
        }
        else {
          return null;
        }
      }

    }

    public function getAccount($a_id)
    {

      if ($type == 'counsellor') {
        $sql = "SELECT counsellor.c_id FROM counsellor INNER JOIN account WHERE counsellor.:a_id = account.:a_id";
      }
      else {
        $sql = "SELECT top_mgmt.t_id FROM top_mgmt INNER JOIN account WHERE top_mgmt.:a_id = account.:a_id";
      }

      $query = $this->db->prepare($sql);
      $parameters = array(':a_id' => $a_id);
      $query->execute();
      $account = $query->fetchAll();

    }

    public function getAllLeads()
    {
        $sql = "SELECT lead.l_id, lead.l_name, lead.address, lead.contact, counsellor.c_name, lead.status, lead.next_followup FROM lead INNER JOIN counsellor WHERE lead.c_id = counsellor.c_id";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function addLead($l_name, $address, $contact, $next_followup)
    {
        $sql = "INSERT INTO lead (l_name, address, contact, next_followup) VALUES (:l_name, :address, :contact, :next_followup)";
        //echo $sql." anything";exit;
        $query = $this->db->prepare($sql);
        $parameters = array(':l_name' => $l_name, ':address' => $address, ':contact' => $contact, ':next_followup' => $next_followup);

        // useful for debugging: you can see the SQL behind above construction by using:
        echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function updateLead($l_id, $l_name, $address, $contact, $next_followup)
    {
        $sql = "UPDATE lead SET l_id = :l_id, l_name = :l_name, address = :address, contact = :contact, next_followup = :next_followup WHERE l_id = :l_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':l_id' => $l_id, ':l_name' => $l_name, ':address' => $address, ':contact' => $contact, ':next_followup' => $next_followup);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
    /**
     * Get a song from database
     */
    public function getLead($l_id)
    {
        $sql = "SELECT * FROM lead WHERE l_id = :l_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':l_id' => $l_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    public function addFollowup($l_id, $status, $feedback, $next_followup, $c_id)
    {
      $sql = "INSERT INTO followup (c_id, l_id, status, feedback, next_followup) VALUES (:c_id, :l_id, :status, :feedback, :next_followup)";
      $query = $this->db->prepare($sql);
      $parameters = array(':c_id' => $c_id, ':l_id' => $l_id, ':status' => $status, ':feedback' => $feedback, ':next_followup' => $next_followup);

      // useful for debugging: you can see the SQL behind above construction by using:
      // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

      $query->execute($parameters);
    }

    public function getAllFollowups()
    {
        $sql = "SELECT * FROM followup";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }
    public function getActiveLeadReport(){
      $sql = "SELECT * FROM `lead`";
      $query = $this->db->prepare($sql);

      // fetch() is the PDO method that get exactly one result
      return $query->fetchAll();
    }

    public function newCounsellor($c_name, $usrname, $pwd)
    {
      $sql = "INSERT INTO account (usrname, pwd, type) VALUES (:usrname, :pwd, :type)";
      $query = $this->db->prepare($sql);
      $parameters = array(':usrname' => $usrname, ':pwd' => $pwd, ':type' => 'counsellor');

      // useful for debugging: you can see the SQL behind above construction by using:
      //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

      $query->execute($parameters);

      $sql2 = "SELECT * FROM account WHERE usrname = :usrname LIMIT 1";
      $query2 = $this->db->prepare($sql2);
      $parameters2 = array(':usrname' => $usrname);

      // useful for debugging: you can see the SQL behind above construction by using:
      // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

      $query2->execute($parameters2);

      // fetch() is the PDO method that get exactly one result
      $account = $query2->fetch();
      $a_id = $account->a_id;

      $sql3 = "INSERT INTO counsellor (c_name, a_id) VALUES (:c_name, :a_id)";
      $query3 = $this->db->prepare($sql3);
      $parameters3 = array(':c_name' => $c_name, ':a_id' => $a_id);
      $query3->execute($parameters3);
    }

    public function getAllCounsellors()
    {
      $sql = "SELECT counsellor.c_id, counsellor.c_name, COUNT(followup.c_id) AS no_of_followups FROM counsellor INNER JOIN followup WHERE counsellor.c_id = followup.c_id";
      $query = $this->db->prepare($sql);
      $query->execute();

      // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
      // core/controller.php! If you prefer to get an associative array as the result, then do
      // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
      // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
      return $query->fetchAll();
    }

    public function updateCounsellor($c_name, $usrname, $pwd, $c_id, $a_id)
    {
        $sql = "UPDATE counsellor SET c_name = :c_name WHERE c_id = :c_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':c_id' => $c_id, ':c_name' => $c_name);

        // useful for debugging: you can see the SQL behind above construction by using:
        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);


        $sql2 = "UPDATE account SET usrname = :usrname, pwd = :pwd WHERE a_id = :a_id";
        $query2 = $this->db->prepare($sql2);
        $parameters2 = array(':a_id' => $a_id, ':usrname' => $usrname, ':pwd' => $pwd);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query2->execute($parameters2);

    }
    /**
     * Get a song from database
     */
    public function getCounsellor($c_id)
    {
        $sql = "SELECT * FROM counsellor WHERE c_id = :c_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':c_id' => $c_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    public function getCounsellorIds()
    {
      $sql = "SELECT c_id FROM counsellor";
      $query = $this->db->prepare($sql);
      $query->execute();

      // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
      // core/controller.php! If you prefer to get an associative array as the result, then do
      // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
      // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
      return $query->fetchAll();
    }

}
