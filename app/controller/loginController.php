<?php

class loginController
{

    var $username;
    var $password;

    function __construct($username = "", $password = "")
    {
        $this->username = $username;
        $this->password = $password;
    }

    //check if all fiels are filled, provide feedback in loginview
    function ReadLoginData()
    {

        if (empty($this->username) && empty($this->password)) {
            return $msg = "Gebruikersnaam en wachtwoord zijn leeg";
        } elseif (empty($this->username)) {
            return $msg = "Gebruikersnaam is leeg";
        } elseif (empty($this->password)) {
            return $msg = "Wachtwoord is leeg";
        }

        //Check login data in database
        $login = new loginModel($this->username, md5($this->password));

        if ($login->CheckLoginData()) {
            header("Location: uitvaartcentra");
        } else {
            return $msg = "Gebruikersnaam of wachtwoord is onjuist";
        }
    }

    function logout()
    {
        if (isset($_SESSION['user'])) {
            //remove all session variables and destory session
            session_unset($_SESSION['user']);
            session_destroy();

            header("Location: /");
        }
    }
}