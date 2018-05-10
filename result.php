<?php
include "functions.php";

/**
 * Created by PhpStorm.
 * User: Gabi
 * Date: 4/12/2018
 * Time: 8:34 PM
 */



    $multiplication = new Multiplications($_POST['startPoint'], $_POST['endPoint'], $_POST['iterations']);

    $database = new DatabaseConnection();
    $database->saveRequestToDB($_POST['startPoint'], $_POST['endPoint'], $_POST['iterations']);


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


    } else {
    ?>
    <html>
    <body>
    <span style="color:red;text-align:center;">Va rugam sa completati toate campurile utilizand doar numere pozitive!<br></span>
    <?php
    }
    ?>
    <button onclick="history.go(-1);">Back</button>
</body>
    </html>



