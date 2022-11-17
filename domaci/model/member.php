<?php

Class Member
{

    public $id;
    public $firstname;
    public $lastname;

    public function __construct($id = null, $firstname = null, $lastname = null)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;       
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM member";
        $result = $conn->query($query);

        if(!$result) 
        {
            echo "Error occured while trying to get all records from 'member'.";
            return null;
        }
        elseif($result->num_rows == 0)
        {
            echo "There are no records in 'member' to show.";
            return null;
        }
        else 
        {
            $members = array();
            while($row = $result->fetch_array()){
                $member = new Member($row["id"], $row["firstname"], $row["lastname"]);
                array_push($members, $member);
            }
            return $members;
        }
    }

    public static function getById(mysqli $conn, $id)
    {
        $query = "SELECT * FROM member WHERE id=$id";
        $members = array();
        $result = $conn->query($query);
        
        if($result){
            $row = $result->fetch_array();
            return new Member($row["id"], $row["firstname"], $row["lastname"]);
        } else {
            echo "No records found in table 'member' with this id.";
            return null;
        }
    }

    public static function deleteById(mysqli $conn, $id)
    {
        $query = "DELETE FROM member WHERE id=$id";
        $result = $conn->query($query);
        return $result;
    }

    public static function add(mysqli $conn, Member $member)
    {
        $query = "INSERT INTO member(id,firstname,lastname) VALUES ($member->id,'$member->firstname','$member->lastname')";
        $result = $conn->query($query);
        return $result;
    }

    public function update(mysqli $conn)
    {
        $query = "UPDATE member SET id=$this->id,firstname='$this->firstname',lastname='$this->lastname'";
        $result = $conn->query($query);
        return $result;
    }
}
?> 