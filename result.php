<?php
include_once "functions.php";
include_once "classes/crud.php";
include_once 'db_connect.php';

$crud = new Crud($db);

$start = 0;
$end = 0;
$iterations = 0;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $crud->getNumb($id);
    $start = $result['start'];
    $end = $result['end'];
    $iterations = $result['iterations'];
    
} elseif (isset($_POST['submit'])) {
    $start = $_POST['startPoint'];
    $end = $_POST['endPoint'];
    $iterations = $_POST['iterations'];
}


$multiplication = new Multiplications($start, $end, $iterations);


if ($multiplication->isInputValid()){
    echo "<pre>";
    echo "<b>1)</b>Sirul de numere in functie de numarul de elemente selectat este:";
    echo "</pre>";

    echo "<pre>";
    print_r($multiplication->getNumbers());
    echo "</pre>";

    echo "<pre>";

    echo "<b>2)</b>multipli de 3 sunt = </br>";
    print_r($multiplication->getFilteredNumbersByMultiplier(3));

    echo "<b>3)</b>numarul de numere multiplu de 4 este =" . count($multiplication->getFilteredNumbersByMultiplier(4)) . "\n <br>";

    echo "<b>4)</b>suma numerelor multiplu de 5 este =" . array_sum($multiplication->getFilteredNumbersByMultiplier(5)) . "\n <br>";

    echo "</pre>";
    ?>
    <button onclick="history.go(-1);">Back</button>
    <?

} else {
?>
<html>
<body>
<span style="color:red;text-align:center;">Va rugam sa completati toate campurile utilizand doar numere pozitive!<br></span>

<?php
}

?>
</body>
</html>


