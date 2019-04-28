<?php

// Singleton to connect db.
class dbConnection
{

    // Hold the class instance.
    private static $instance;

    public $conn;

    private function __construct()
    {
        try {
            //vars from config file
            $config = config::GetInstance();

            $host = $config->getHost();
            $user = $config->getUser();
            $pass = $config->getPass();
            $name = $config->getName();

            $this->conn = new mysqli($host, $user, $pass, $name);
        } catch (Exception $e) {
            debug::LogVarToFile('dbConnection message: ' . $e->getMessage());
        }
    }

    //Create instance of class
    public static function GetInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
