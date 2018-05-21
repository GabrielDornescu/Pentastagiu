<?php

class Crud
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "multiplication";

    // object properties
    public $startpoint;
    public $endpoint;
    public $iterations;
    public $numbers;

    public function __construct($db)
    {
        $this->db_conn = $db;
    }


    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET start = ?, end = ?, iterations = ?";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->startpoint);
        $prep_state->bindParam(2, $this->endpoint);
        $prep_state->bindParam(3, $this->iterations);


        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }

    }

    // for pagination
    public function countAll()
    {
        $sql = "SELECT id FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); //Returns the number of rows affected by the last SQL statement
        return $num;
    }


    function update($id)
    {
        $sql = "UPDATE " . $this->table_name . " SET start = :start, end = :end, iterations = :iterations  WHERE id = :id";
        // prepare query
        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(':start', $this->startpoint);
        $prep_state->bindParam(':end', $this->endpoint);
        $prep_state->bindParam(':iterations', $this->iterations);
        $prep_state->bindParam(':id', $id);

        // execute the query
        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function delete($id)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id = :id ";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $id);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function getAllNumbers($from_record_num, $records_per_page)
    {
        $sql = "SELECT id, start, end, iterations, datetime FROM " . $this->table_name . " ORDER BY id ASC LIMIT ?, ?";


        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

    // for edit numbers form when filling up
    function getNumb($id)
    {
        $sql = "SELECT start, end, iterations, datetime FROM " . $this->table_name . " WHERE id = :id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $id);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return [];
        }

        $this->startpoint = $row['start'];
        $this->endpoint = $row['end'];
        $this->iterations = $row['iterations'];
        $this->datetime = $row['datetime'];

        return [
            'start' => $this->startpoint,
            'end' => $this->endpoint,
            'iterations' => $this->iterations,
        ];

    }


}







