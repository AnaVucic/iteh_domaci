<?php

class Membership
{
    public DateTime $start;
    public $status;
    public ?Member $member;
    public ?MembershipType $membershiptype;

    public function __construct(DateTime $start = null, $status = null, ?Member $member = null, ?MembershipType $membershiptype = null)
    {
        $this->start = $start;
        $this->status = $status;
        $this->member = $member;
        $this->membershiptype = $membershiptype;    
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM membership";

        if(!$result = $conn->query($query)) {
            echo "Error occured while trying to get all records";
            return null;
        } 
        elseif($result->num_rows == 0){
            echo 'There are no memberships in database to show.';
            return null;
        } else {
            $memberships = array();
            while($row = $result->fetch_array()){
                $membership = new Membership($row["MemberID"], $row["MembershipID"], $row["StartDate"], $row["Status"], $row["Fee"]);
                array_push($memberships, $membership);
            }
            return $memberships;
        
        }
    }






}

?>