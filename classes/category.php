<?php


class Category
{
    // table name definition and database connection
    private $db_conn;
    private $table_name = "pentastagiu";

    // object properties
    public $id;
    public $numbers;

    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    // used by create.php and edit.php to select category drop-down list
    function getAll()
    {
        //select all data
        $sql = "SELECT id FROM " . $this->table_name . "  ORDER BY id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        return $prep_state;
    }
}
