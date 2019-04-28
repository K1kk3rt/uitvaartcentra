<?php

//show error messages, only for dev
error_reporting(E_ALL);
ini_set('display_errors', 1);

class config
{

    private static $instance;

    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;

    //getters
    public function getHost(){
        return $this->dbhost;
    }
    public function getUser(){
        return $this->dbuser;
    }
    public function getPass(){
        return $this->dbpass;
    }
    public function getName(){
        return $this->dbname;
    }


    private function __construct()
    {
        $this->dbhost = 'localhost';
        $this->dbuser = 'uitvaartcentra';
        $this->dbpass = 'dinki14';
        $this->dbname = 'uitvaartcentra';
    }

    public static function GetInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
