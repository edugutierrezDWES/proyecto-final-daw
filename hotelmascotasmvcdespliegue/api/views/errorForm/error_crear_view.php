<?php session_start();?> 
<?php
require_once("../../db/db.php");

if(!isset($_SESSION) || empty($_SESSION)){
    navigateTo("/login");
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="/css/bootstrap-select.css" rel="stylesheet">
<link href="/css/bootstrap-icons.css" rel="stylesheet">
<link href="/css/tables.css" rel="stylesheet">
<link href="/css/styles.css" rel="stylesheet">
    <title>Error Editar</title>
</head>
<style>
    body{
        height: 80vh;
        display: grid;
        place-items: center;
    }

    p{
        text-align: center;
        font-size: 1.2rem;
    }

    img{
        width: 400px;
        height: 500px;
    }
</style>
<body>
<div class="card border-white">
    <div class="card-header">
        
    </div>  
    <img class="mx-auto d-block" src="https://static4.depositphotos.com/1001911/315/v/600/depositphotos_3153930-stock-illustration-sad-kitten.jpg" alt="Card image cap">
    <div class="card-body">
        <h2 class="card-title">Vaya... No se ha podido crear ésta mascota!</h2>
        <p class="card-text">Aségurate que todos los campos están correctos y que están rellenos.</p>
    </div>
    <div class="card-footer">
        <a href=".." class="btn btn_orange bt_login">Volver</a>

    </div>
</div>
   
    
</body>
</html>