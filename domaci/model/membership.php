<?php

class Membership
{
    public $id;
    public $type;
    public $fee;
    public $duration;

    public function __construct( $id = null, $type = null, $fee = null, $duration = null)
    {
        $this->id = $id;
        $this->type = $type;  
        $this->fee = $fee;
        $this->duration = $duration;  
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
            echo "There are no records in 'membership' to show.";
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

    public static function getById(mysqli $conn, $id)
    {
        $query = "SELECT * FROM membership WHERE id=$id";
        $memberships = array();
        $result = $conn->query($query);
        
        if($result){
            $row = $result->fetch_array();
            return new Membership($row["id"], $row["type"], $row["fee"], $row["duration"]);
        } else {
            echo "No records found in table 'membership' with this id.";
            return null;
        }
    }

    public static function deleteById(mysqli $conn, $id)
    {
        $query = "DELETE FROM membership WHERE id=$id";
        $result = $conn->query($query);
        return $result;
    }

    public static function add(mysqli $conn, Membership $membership)
    {
        $query = "INSERT INTO membership(id,type,fee,duration) VALUES ($membership->id,'$membership->firsttype',$membership->fee,$membership->duration)";
        $result = $conn->query($query);
        return $result;
    }

    public function update(mysqli $conn)
    {
        $query = "UPDATE membership SET id=$this->id,type='$this->type',fee=$this->fee,duration=$this->duration";
        $result = $conn->query($query);
        return $result;
    }
    }


?>