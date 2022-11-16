<?php

class Membership
{
    public $id;
    public $type;
    public $fee;
    public $duracion;

    public function __construct( $id = null, $type = null, $fee = null, $duration = null)
    {
        $this->id = $id;
        $this->type = $type;  
        $this->fee = $fee;
        $this->duracion = $duration;  
    }

    public static function getAll(mysqli $conn)
    {

        $query = "SELECT * FROM membership";

        $result = $conn->query($query);

        if(!$result) 
        {
            echo "Error occured while trying to get all records from 'membership'.";
            return null;
        } 

        elseif($result->num_rows == 0)
        {
            echo "There are no records in table 'membership' to show.";
            return null;
        } 
        else 
        {
            $memberships = array();
            while($row = $result->fetch_array()){
                $membership = new Membership($row["id"], $row["type"], $row["fee"], $row["duration"]);
                array_push($memberships, $membership);
            }
            return $memberships;
        
        }
    }






}

?>