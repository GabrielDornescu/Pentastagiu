<?php
// include database and object files
include_once 'classes/database.php';
include_once 'classes/crud.php';
include_once 'classes/category.php';
include_once 'db_connect.php';


// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 5; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query limit clause

// instantiate database and user object
$numb = new Crud($db);
$category = new Category($db);

// include header file
$page_title = "C.R.U.D";
include_once "header.php";

// create user button
echo "<div class='right-button-margin'>";
echo "<a href='crud/create.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon-plus'></span> HOME";
echo "</a>";
echo "</div>";

// select all users
$prep_state = $numb->getAllNumbers($from_record_num, $records_per_page); //Name of the PHP variable to bind to the SQL statement parameter.
$num = $prep_state->rowCount();

// check if more than 0 record found
if($num>=0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>Startpoint</th>";
    echo "<th>Endpoint</th>";
    echo "<th>Iterations</th>";
    echo "<th>Id</th>";
    echo "<th>Datetime</th>";
    echo "<th>Actions</th>";
    echo "</tr>";

    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

        extract($row); //Import variables into the current symbol table from an array

        echo "<tr>";

        echo "<td>$row[start]</td>";
        echo "<td>$row[end]</td>";
        echo "<td>$row[iterations]</td>";
        echo "<td>$row[id]</td>";
        echo "<td>$row[datetime]</td>";


        echo "<td>";
        // edit numbers button
        echo "<a href='crud/edit.php?id=" . $id . "' class='btn btn-warning left-margin'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
        echo "</a>";

        // delete numbers button
        echo "<a href='crud/delete.php?id=" . $id . "' class='btn btn-danger delete-object left-margin'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
        echo "</a>";

        // run multiplication button
        echo "<a href='result.php?id=" . $id . "' class='btn btn-info left-margin'>";
        echo "<span class='glyphicon glyphicon-share'></span> Run Multiplication";
        echo "</a>";

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // include pagination file
    include_once 'pagination.php';
}

// if there are no user
else{
    echo "<div> No Numbers found. </div>";
    }
?>


<?php
include_once "footer.php";
?>
