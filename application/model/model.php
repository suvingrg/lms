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

    /**
     * Get all songs from database
     */
    public function getAllLeads()
    {
        $sql = "SELECT * FROM lead";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addLead($l_name, $address, $contact, $next_followup)
    {
        $sql = "INSERT INTO lead (l_name, address, contact, next_followup) VALUES (:l_name, :address, :contact, :next_followup)";
        $query = $this->db->prepare($sql);
        $parameters = array(':l_name' => $l_name, ':address' => $address, ':contact' => $contact, ':next_followup' => $next_followup);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
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

    public function addFollowup($l_id, $c_id)
    {
      $sql = "INSERT INTO followup (c_id, l_id, f_date, feedback, next_followup) VALUES (:c_id, :l_id, :f_date, :feedback, :next_followup)";
      $query = $this->db->prepare($sql);
      $parameters = array(':l_name' => $l_name, ':address' => $address, ':contact' => $contact, ':next_followup' => $next_followup);

      // useful for debugging: you can see the SQL behind above construction by using:
      // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

      $query->execute($parameters);
    }

}
