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

        if(!$result = $conn->query($query)) {
            echo "Error occured while retrievein records from 'member'.";
            return null;
        } 
        elseif($result->num_rows == 0){
            echo "There are no records in 'member' to show.";
            return null;
        } else {
            $members = array();
            while($row = $result->fetch_array()){
                $member = new Member($row["id"], $row["firstname"], $row["lastname"]);
                array_push($members, $member);
            }
            return $members;
        
        }
    }

    public static function getById(mysqli $conn, $id){
        $query = "SELECT * FROM member WHERE MemberID=$id";
        if($result = $conn->query($query)){
            $row = $result->fetch_array("MemberID");
            return new Member($row["MemberID"], $row["Firstname"], $row["Lastname"]);
        } else {
            echo "No members found by this id";
            return null;
        }

    }


}


?>