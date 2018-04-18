<?php
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
            <input type="submit" name="Help" value="Help" onclick="curl()"/>
        </form>
    </div>
    <div class="clear"></div>
</div>
<h2><img src="PHP.png" alt="PHP Logo"></h2>

</div>
</body>
</html>













