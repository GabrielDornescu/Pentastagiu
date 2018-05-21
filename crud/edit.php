<?php
// set page headers
$page_title = "Edit Numbers";
include_once "../header.php";

// read numbers button
echo "<div class='right-button-margin'>";
    echo "<a href='../index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Read Numbers ";
    echo "</a>";
echo "</div>";

// isset() is a PHP function used to verify if ID is there or not
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR! ID not found!');

// include database and object user file
include_once '../classes/database.php';
include_once '../classes/crud.php';
include_once '../db_connect.php';

// instantiate numbers object
$numb = new Crud($db);
$numb->getNumb($id);

// check if the form is submitted
if($_POST)
{

    // set numbers property values
    $numb->startpoint = htmlentities(trim($_POST['start']));
    $numb->endpoint = htmlentities(trim($_POST['end']));
    $numb->iterations = htmlentities(trim($_POST['iterations']));


    // Edit numbers
    if($numb->update($id)){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Success! Number is edited.";
        echo "</div>";
    }

    // if unable to edit numbers
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Unable to edit number.";
        echo "</div>";
    }
}
?>

    <!-- Bootstrap Form for updating a number -->
    <link href="../library/css/bootstrap.css" rel="stylesheet" media="screen" />
    <link href="../library/css/bootstrap.min.css" rel="stylesheet">
    <script src="../library/js/bootstrap.min.js"></script>
    <form action='edit.php?id=<?php echo $id; ?>' method='post'>

        <table class='table table-hover table-responsive table-bordered'>

            <tr>
                <td>Startpoint</td>
                <td><input type='number' name='start' value='<?php echo $numb->startpoint;?>' class='form-control' placeholder="Enter First Number" required></td>
            </tr>

            <tr>
                <td>Endpoint</td>
                <td><input type='number' name='end' value='<?php echo $numb->endpoint;?>' class='form-control' placeholder="Enter Last Number" required></td>
            </tr>

            <tr>
                <td>Iterations</td>
                <td><input type='number' name='iterations' value='<?php echo $numb->iterations;?>' class='form-control' placeholder="Enter Iterations" required></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-success" >
                        <span class=""></span> Update
                    </button>
                </td>
            </tr>

        </table>
    </form>

<?php
include_once "../footer.php";
?>