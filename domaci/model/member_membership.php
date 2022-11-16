<?php

class MemberMembership {

    public $firstname;
    public $lastname;
    public $member_id;
    public $membership_id;
    public $start_date;
    public $status;

    public function __construct($member_id = null, $membership_id = null, $start_date = null, $status = null)
    {
        $this->member_id = $member_id;
        $this->membership_id = $membership_id;
        $this->start_date = $start_date;
        $this->status = $status;
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT m.firstname,m.lastname,ms.type,ms.fee,ms.duration,mm.start_date,mm.status FROM member_membership mm
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
                $member_membership = new MemberMembership($row["m.firstname"], $row["m.lastname"], $row["ms.type"], $row["ms.fee"], $row["ms.duration"], $row["mm.start_date"], $row["mm.status"]);
                array_push($member_memberships, $member_membership);
            }
            return $member_memberships;
        
        }
    }
}

?>