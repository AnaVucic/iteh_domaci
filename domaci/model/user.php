<?php

class User
{
    public $id;
    public $username;
    public $password;

    public function __construct($id = null, $username = null, $password = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public static function logInUser($user, mysqli $conn)
    {
        
        $query = "SELECT * FROM user WHERE username='$user->username' AND password='$user->password'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            return new User($result->fetch_assoc()["user_id"], $user->username, $user->password);
        }
        
        return null;
    }

}
