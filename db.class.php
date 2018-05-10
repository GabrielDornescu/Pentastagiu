<?php
/**
 * Created by PhpStorm.
 * User: Gaby
 * Date: 08/05/2018
 * Time: 23:13
 */

class DatabaseConnection
{
    public $conn;
    public $host;
    public $user;
    public $password;
    public $basename;



    public function __construct($params=array())
    {   $this->connect = false;
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->basename = "pentastagiu";
    }


    public function connection()
    {
        $this->connect->mysqli_connect ($this->host,$this->user,$this->password,$this->basename);
        if(!$this->connect)
        {
            die("connection object not created: ".mysqli_error($this->connect));
        }
    }


    public function saveRequestToDB()
    {

        if (isset($_POST['submit'])) {

            $startpoint = $_POST['startPoint'];
            $endpoint = $_POST['endPoint'];
            $iterations = $_POST['iterations'];

            $connection=$this->mysqli_query("INSERT INTO multiplication (start,end,iterations) VALUES ('$startpoint', '$endpoint','$iterations')");
            if(!$connection)
                throw new Exception("Error: not connect to the server");

        }

    }
}

