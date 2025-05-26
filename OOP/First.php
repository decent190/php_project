<?php

class First{
    protected  $host ='localhost';
    protected $username='root';
    protected $db_password='';
    protected $database='january_php';
    protected $connect;

    public function __construct(){
    //    $this->connect=mysqli_connect($this->host,$this->username,$this->db_password,$this->database);
       $this->connect= new mysqli($this->host,$this->username,$this->db_password,$this->database);
       if($this->connect){
        echo "Database connected";
       }else{
        echo "Error occcured".mysqli_connect_error();
       }
    }

    protected $name='janet';
    public $school ='SQI';

    public function getName(){
        echo $this->name;
    }

}
$newClass = new First;
// echo $newClass->name;

$newClass->getName();

class Secocnd extends First{
    public $username = "shollboy";

    public function getSchool(){
        echo $this->name;
    }
}
// $newSecond = new Second;
// $newSecond->getSchool();
?>