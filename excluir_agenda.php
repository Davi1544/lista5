<?php
    require "includes/conexao.php";
    $id_ag = $_GET['id_ag'];

    $query = "delete from agenda where id_agenda = ".$id_ag;
    $res = mysqli_query($con, $query);
    if(mysqli_affected_rows($con) == 1){
        header("Location:listar_agenda.php");
    } else{
        echo "Falha ao excluir agenda<br>";
    }
?>