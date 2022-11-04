<?php

class MembershipType 
{
    public $id;
    public $name;
    public $description;
    public $duration;
    public $fee;

    public function __construct($id = null, $name = null, $description = null, $duration = null, $fee = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->duration = $duration;
        $this->fee = $fee;
        
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM membershiptype";

        if(!$result = $conn->query($query)) {
            echo "Error occured while trying to get all records";
            return null;
        } 
        elseif($result->num_rows == 0){
            echo 'There are no membership types in database to show.';
            return null;
        } else {
            $membershiptypes = array();
            while($row = $result->fetch_array()){
                $membershiptype = new MembershipType($row["MembershipID"], $row["MembershipName"], $row["Description"], $row["Duration"], $row["Fee"]);
                array_push($membershiptypes, $membershiptype);
            }
            return $membershiptypes;
        
        }
    }

    
}


?>