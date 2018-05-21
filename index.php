<?php
<<<<<<< HEAD

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
=======
/**
 * Created by PhpStorm.
 * User: Gabi
 * Date: 4/12/2018
 * Time: 8:34 PM
 */

include 'functions.php';


?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagiu</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/reset.css"/>
    <link rel="stylesheet" type="text/css" href="public/style.css"/>
</head>
<body>


<div class="wrapper">
    <div class="line center bold">
        <img src="logo.png" alt="Pentalog Logo">
        <h1>-2018-</h1>
    </div>
    <div class="line">
        <ol class="ml20">
            <li>Generati un array de numere
                <ul>
                    <li>cuprins intre <span class="bold">Numar de pornire</span> si <span
                                class="bold">Numar de sfarsit</span> excluzand cele doua numere
                    </li>
                    <li>numarul maxim de elemente este <span class="bold">Numar de elemente</span></li>
                </ul>
            </li>
            <li>Afisati toate numerele multiplu de 3</li>
            <li>Numar de numere multiplu de 4</li>
            <li>Suma numerelor multiplu de 5</li>
        </ol>
    </div>

    <div class="line">
        <form action="result.php" method="POST" class="center">
            <p class="label">Numar de pornire</p>
            <input type="text" name="startPoint"/>
            <p class="label">Numar de sfarsit</p>
            <input type="text" name="endPoint"/>

            <p class="label">Numar de elemente</p>
            <input type="text" name="iterations"/>

            <br/><br/>

            <input type="submit" name="submit"/>
        </form>
        <form action="curl.php">
            <input type="submit" name="Help" value="Help"/>
        </form>
    </div>
    <div class="clear"></div>
</div>
<h2><img src="PHP.png" alt="PHP Logo"></h2>

</div>
</body>
</html>













>>>>>>> e7df7e8e30f053c07bb66cf0ed375d48c6442e0e
