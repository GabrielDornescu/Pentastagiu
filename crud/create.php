<?php

// set page headers
$page_title = "Create Multiplication";
include_once "../header.php";

// read crud button
echo "<div class='right-button-margin'>";
    echo "<a href='../index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Get C.R.U.D ";
    echo "</a>";
echo "</div>";

// get database connection
include_once '../classes/database.php';
include_once '../db_connect.php';


// check if the form is submitted
if ($_POST){

    // instantiate numbers object
    include_once '../classes/crud.php';
    $numb = new Crud($db);

    // set user property values
    $numb->startpoint = htmlentities(trim($_POST['startPoint']));
    $numb->endpoint = htmlentities(trim($_POST['endPoint']));
    $numb->iterations = htmlentities(trim($_POST['iterations']));


    // if the numbers are able to create
    if($numb->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Success! All the numbers are saved into Database";
        echo "</div>";
    }

    // if the numbers unable to create
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Unable to save numbers into database";
        echo "</div>";
    }
}
?>
<!-- Bootstrap Form for creating multiplication -->

<link href="../library/css/bootstrap.css" rel="stylesheet" media="screen" />
<link href="../library/css/bootstrap.min.css" rel="stylesheet">
<script src="../library/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../library/css/style.css"/>
<html>

<div class="wrapper">
    <div class="line_center_bold">
        <img src="../logo.png" alt="Pentalog Logo">
        <h1>-2018-</h1>
    </div>
    <div class="line">
        <ol class="ml20">
            <li>Generati un array de numere
<ul>
    <li>cuprins intre <span class="bold">Numar de pornire</span> si <span class="bold">Numar de sfarsit</span> excluzand cele doua numere
</li>
    <li>numarul maxim de elemente este <span class="bold">Numar de elemente</span></li>
                </ul>
            </li>
            <li>Afisati toate numerele multiplu de 3</li>
            <li>Numar de numere multiplu de 4</li>
            <li>Suma numerelor multiplu de 5</li>
        </ol>
    </div>
</div>

<form action='create.php' role="form" method='post' style="width: 600px;margin-left: auto;margin-right: auto">

    <table class ='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Startpoint</td>
            <td><input type='number' name='startPoint'  class='form-control' placeholder="Enter First Number" required></td>
        </tr>

        <tr>
            <td>Endpoint</td>
            <td><input type='number' name='endPoint' class='form-control' placeholder="Enter Last Number" required></td>
        </tr>

        <tr>
            <td>Iterations</td>
            <td><input type='number' name='iterations' class='form-control' placeholder="Enter Iteration " required></td>
        </tr>



        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Add to Database
                </button>
                <button type="submit" name="submit" class="btn btn-primary" formaction="../result.php">
                    <span class="glyphicon glyphicon-plus"></span> Run Multiplication
                </button>
            </td>

        </tr>

    </table>
</form>
<h2><img src="../PHP.png" alt="PHP Logo"></h2>

<?php
include_once "../footer.php";
?>

