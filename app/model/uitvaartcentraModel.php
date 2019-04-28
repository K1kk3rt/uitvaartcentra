<?php

class uitvaartcentraModel extends baseModel
{

    function __construct()
    {
        parent::__construct();
    }

    function getAllUitvaartcentras()
    {
        //prepare and execute sql query
        $sql = "SELECT f.id, f.name, l.street, l.houseNumber, l.city, f.can_deliver, f.comment 
        FROM funeralParlour AS f 
        JOIN locations AS l ON f.id = l.id";
        $result = $this->conn->query($sql);

        return parent::ConvertResultToArray($result);
    }

    function insertUitvaartcentra($name, $street, $houseNumber, $city, $can_deliver, $comment)
    {
        //prepare and execute sql query
        $sql = "INSERT INTO funeralParlour (name, can_deliver, comment) VALUES('" . $name . "', '" . $can_deliver . "', '" . $comment . "');";
        $sql2 = "INSERT INTO locations (id, street, houseNumber, city) VALUES(LAST_INSERT_ID(),'" . $street . "', '" . $houseNumber . "','" . $city . "');";

        $bool1 = false;
        $bool2 = false;

        if ($this->conn->query($sql) === TRUE) {
            $bool1 = true;
        } else {
            $bool1 = false;
            debug::LogVarToFile("Error: " . $sql . "<br>" . $this->conn->error);
        }

        if ($this->conn->query($sql2) === TRUE) {
            $bool2 = true;
        } else {
            $bool2 = false;
            debug::LogVarToFile("Error: " . $sql . "<br>" . $this->conn->error);
        }

        if ($bool1 && $bool2) {
            return true;
        } else {
            return false;
        }
    }

    function editUitvaartcentra($id, $name, $street, $houseNumber, $city, $can_deliver, $comment)
    {
        //prepare and execute sql query
        $sql = "UPDATE funeralParlour
        SET name='" . $name . "', can_deliver='" . $can_deliver . "', comment='" . $comment . "' 
        WHERE id = " . $id . ";";
        $sql2 = "UPDATE locations
        SET street='" . $street . "', houseNumber='" . $houseNumber . "', city='" . $city . "' 
        WHERE id = " . $id . ";";

        $bool1 = false;
        $bool2 = false;

        if ($this->conn->query($sql) === TRUE) {
            $bool1 = true;
        } else {
            $bool1 = false;
            debug::LogVarToFile("Error: " . $sql . "<br>" . $this->conn->error);
        }

        if ($this->conn->query($sql2) === TRUE) {
            $bool2 = true;
        } else {
            $bool2 = false;
            debug::LogVarToFile("Error: " . $sql . "<br>" . $this->conn->error);
        }

        if ($bool1 && $bool2) {
            return true;
        } else {
            return false;
        }
    }

    function deleteUitvaartcentra($id)
    {
        //prepare and execute sql query
        $sql = "DELETE FROM funeralParlour WHERE id='" . $id . "';";
        $sql2 = "DELETE FROM locations WHERE id='" . $id . "';";

        $bool1 = false;
        $bool2 = false;

        if ($this->conn->query($sql) === TRUE) {
            $bool1 = true;
        } else {
            $bool1 = false;
            debug::LogVarToFile("Error: " . $sql . "<br>" . $this->conn->error);
        }

        if ($this->conn->query($sql2) === TRUE) {
            $bool2 = true;
        } else {
            $bool2 = false;
            debug::LogVarToFile("Error: " . $sql . "<br>" . $this->conn->error);
        }

        if ($bool1 && $bool2) {
            return true;
        } else {
            return false;
        }
    }
}