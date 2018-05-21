<?php
/**
 * Created by PhpStorm.
 * User: Gaby
 * Date: 08/05/2018
 * Time: 23:13
 */

class DatabaseConnection
{
    /**
     * @var mysqli
     */
    public $connect;
    public $host;
    public $user;
    public $password;
    public $basename;


    public function __construct()
    {
        $this->connect = false;
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->basename = "pentastagiu";
        $this->connection();
    }


    public function connection()
    {
        $this->connect = mysqli_connect($this->host, $this->user, $this->password, $this->basename);
        if (!$this->connect) {
            die("connection object not created: " . mysqli_error($this->connect));
        }
    }


    public function saveRequestToDB($startpoint, $endpoint, $iterations)
    {

        $connection = mysqli_query($this->connect, "INSERT INTO multiplication (start,end,iterations) VALUES ('$startpoint', '$endpoint','$iterations')");
        if (!$connection)
            throw new Exception("Error: not connect to the server");

    }


}

