<?php
    function resolveImg($x, $y){
        if(file_exists($x)){
            $destino = 'fotos/';
            $extensao = strtolower(substr($y, -4));
            $nome_foto = $destino . date("Ymd-His") . $extensao;
            move_uploaded_file($x, $nome_foto); 
            return $nome_foto;
        }else return "";
    }

    require 'includes/conexao.php';
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $tel = $_POST['tel'];
    $cel = $_POST['cel'];
    $email = $_POST['email'];

    $check = "SELECT * FROM agenda WHERE email = '$email'";
    foreach(mysqli_query($con, $check) as $key => $value){
        $res = $value['email'];
        $id_agenda = $value['id_agenda'];
        $foto = $value['foto'];
    }

    if(isset($res)){
    
        if(isset($foto)){

            unlink($foto);

            if(isset($_FILES["foto"]['name'])) $nome_foto = resolveImg($_FILES["foto"]['tmp_name'], $_FILES["foto"]['name']);
            else $nome_foto = '';

        }else{
            $nome_foto = '';
        }

        $sql = "update agenda set nome = '$nome', apelido = '$apelido', endereco = '$endereco', bairro = '$bairro', cidade = '$cidade', estado = '$estado', telefone = '$tel', celular = '$cel', email = '$email', foto = '$nome_foto' where id_agenda = ".$id_agenda;
        $res = mysqli_query($con, $sql);
        if(mysqli_affected_rows($con) == 1){
            header("Location:listar_agenda.php");
        } else{
            echo "Falha na gravação do registro<br>";
        }

    }else{
        echo "Essa agenda não existe<br>";
        echo "<a href='listar_agenda.php'>Voltar à lista</a>";
    }
?>