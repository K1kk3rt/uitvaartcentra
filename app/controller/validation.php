<?php

class validation
{
    var $data;

    function __construct($data = "")
    {
        $this->data = $data;
    }

    function validate_input($data)
    {
        //create connection for mysqli_real_escape_string()
        $db = dbConnection::GetInstance();
        $conn = $db->conn;

        //prevent code injection
        $data = trim($data);
        $data = mysqli_real_escape_string($conn, $data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);

        return $data;
    }
}
