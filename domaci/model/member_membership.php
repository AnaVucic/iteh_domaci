<?php

require "member.php";
require "membership.php";

class MemberMembership {

    public $id;
    public ?Member $member;
    public ?Membership $membership;
    public DateTime $start_date;
    public $status;


    public function __construct($id = null, ?Member $member = null, ?Membership $membership = null, DateTime $start_date = null, $status = null )
    {
        $this->id = $id;
        $this->member = $member;
        $this->membership = $membership;
        $this->start_date = $start_date;
        $this->status = $status;
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM member_membership mm
        JOIN MEMBER m ON m.id=mm.member_id
        JOIN membership ms ON ms.id=mm.membership_id";

        if(!$result = $conn->query($query)) {
            echo "Error occured while retrievein records from 'member_membership'.";
            return null;
        } 
        elseif($result->num_rows == 0){
            echo "There are no records in 'member_membership' to show.";
            return null;
        } else {
            $member_memberships = array();
            while($row = $result->fetch_array()){
                $id = $row["id"];
                $member = new Member($row["id"], $row["firstname"], $row["lastname"]);
                $membership = new Membership($row["id"], $row["type"], $row["fee"], $row["duration"]);
                $start_date = new DateTime($row["start_date"]);
                $status = $row["status"];
                $member_membership = new MemberMembership($id, $member, $membership, $start_date, $status);
                array_push($member_memberships, $member_membership);
            }
            return $member_memberships;
        
        }
    }

    public static function getById(mysqli $conn, $id)
    {
        $query = "SELECT * FROM member_membership WHERE id=$id";
        $member_memberships = array();
        $result = $conn->query($query);
        
        if($result){
            $member_memberships = array();
            while($row = $result->fetch_array()){
                $id = $row["id"];
                $member = new Member($row["id"], $row["firstname"], $row["lastname"]);
                $membership = new Membership($row["id"], $row["type"], $row["fee"], $row["duration"]);
                $start_date = new DateTime($row["start_date"]);
                $status = $row["status"];
                $member_membership = new MemberMembership($id, $member, $membership, $start_date, $status);
                array_push($member_memberships, $member_membership);
            }
            return $member_memberships;
        } else {
            echo "No records found in table 'member_membership' with this id.";
            return null;
        }
    }

    public static function deleteById(mysqli $conn, $id)
    {
        $query = "DELETE FROM member_membership WHERE id=$id";
        $result = $conn->query($query);
        return $result;
    }

    public static function add(mysqli $conn, MemberMemberShip $member_membership)
    {
        $query = "INSERT INTO member_membership(id,member_id,membership_id,start_date,status) VALUES ($member_membership->id,$member_membership->member->id,$member_membership->membership->id, '$member_membership->start_date',$member_membership->status)";
        $result = $conn->query($query);
        return $result;
    }

    public function update(mysqli $conn)
    {
        $query = "UPDATE member_membership SET id=$this->id,member_id=$this->member->id,membership_id=$this->membership->id, start_date='$this->start_date',status=$this->status";
        $result = $conn->query($query);
        return $result;
    }
}

?>