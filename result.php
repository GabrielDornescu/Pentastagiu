<?php
/**
 * Created by PhpStorm.
 * User: Gabi
 * Date: 4/12/2018
 * Time: 8:34 PM
 */

include 'functions.php';
?>

<html>
<head>
    <style>
        table {
            border-style: solid;
            border-width: 2px;
            border-color: pink;
        }
    </style>
</head>

<body bgcolor="#EEFDEF">

    <?php

    if (isValid()){
        multiplication();
        register_database();
    } else {
    ?>
    <span style="color:red;text-align:center;">Va rugam sa completati toate campurile utilizand doar numere pozitive!<br>
    <?php
    }
    ?>
    <button onclick="history.go(-1);">Back</button>
</body>

