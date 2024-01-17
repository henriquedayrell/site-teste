<?php
include "php/checkauth.php";
include "php/conexao.php";
if(!isset($title))
$title = "games";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    

</head>
<body class="light-theme">
<div>
            <button type="button" onclick="setThemeButton()" class="btn btn-theme">theme</button>
        </div>
        <button type="button" class="btn" onclick="window.location = 'logout.php'">Logout</button> 
    