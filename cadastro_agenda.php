<?php
    function resolveImg($x, $y){
        if(file_exists($x)){
            $destino = 'fotos/';
            $extensao = strtolower(substr($y, -4));
            $nome_foto = $destino . date("y-m-d") . $extensao;
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

    $data = date("y-m-d");

    $check = "SELECT * FROM agenda WHERE email = '$email'";
    foreach(mysqli_query($con, $check) as $key => $value){
        $res = $value['email'];
    }

    if(!isset($res)){
        $nome_foto = resolveImg($_FILES["foto"]['tmp_name'], $_FILES["foto"]['name']);

        $sql = "INSERT INTO agenda VALUES(NULL, '$nome', '$apelido', '$endereco', '$bairro', '$cidade', '$estado', '$tel', '$cel', '$email', '$data', '$nome_foto')";
        $res = mysqli_query($con, $sql);
        if(mysqli_affected_rows($con) == 1){
            header("Location:listar_agenda.php");
        } else{
            echo "Falha na gravação do registro<br>";
        }

    }else{
        echo "Usuário com esse email já cadastrado<br>";
        echo "<a href='cadastro_agenda.html'>Voltar ao cadastro</a>";
    }

?>