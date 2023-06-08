<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "lista5";
    $port = 3306;
    $con = mysqli_connect($hostname, $username, $password, $database, $port);

    if(mysqli_connect_errno()){
        printf("Erro conexão: %s \n", mysqli_connect_error());
        exit();
    }
?>
