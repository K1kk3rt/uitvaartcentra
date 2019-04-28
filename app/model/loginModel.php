<?php

class loginModel extends baseModel
{
    private $username;
    private $password;

    function __construct($username = '', $password = '')
    {
        parent::__construct();

        $this->username = $username;
        $this->password = $password; //encrypted
    }

    function CheckLoginData()
    {
        //prepare and execute sql query
        $sql = "SELECT * 
        FROM users 
        WHERE username = '" . $this->username . "' AND password = '" . $this->password . "'";
        $result = $this->conn->query($sql);

        if ($this->CheckIfResultIsOneRow($result)) {
            //create session
            session_start();
            $_SESSION['user'] = mysqli_fetch_assoc($result);
            return true;
        } else {
            return false;
        }
    }
}
