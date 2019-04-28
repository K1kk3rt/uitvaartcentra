<?php

class baseModel
{
    protected $conn;

    function __construct()
    {
        $db = dbConnection::GetInstance();
        $this->conn = $db->conn;
    }

    protected function ConvertResultToArray($result)
    {
        //if there are more than 0 rows, put result in array and return array. Else return false
        if ($result->num_rows > 0) {
            // output data of each row
            $rows;
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $rows[$i] = $row;
                $i++;
            }
            return $rows;
        } else {
            return false;
        }
    }

    protected function CheckIfResultIsOneRow($result)
    {
        //If there is a match, there will be one row in $return statement
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
}
