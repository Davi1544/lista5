<?php
    require "includes/conexao.php";
    $id_agenda = $_GET['id_ag'];
    $sql = "SELECT * FROM agenda where id_agenda = $id_agenda";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Update</title>
    <style>
        form{
            width: 70vw;
            padding: 1vw;
            border: 1px black solid;
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <img width="50px" height="50px" src="<?php echo $row['foto']; ?>" alt="" srcset="">
    <form action="altera_agenda_exe.php" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
        <input type="text" name="nome" class="form-control" placeholder="nome" id="" value="<?php echo $row['nome']?>"><br>
        <input type="text" name="apelido" class="form-control" placeholder="apelido" id="" value="<?php echo $row['apelido']?>"><br>
        <input type="text" name="endereco" class="form-control" placeholder="endereco" id="" value="<?php echo $row['endereco']?>"><br>
        <input type="text" name="bairro" class="form-control" placeholder="bairro" id="" value="<?php echo $row['bairro']?>"><br>
        <input type="text" name="cidade" class="form-control" placeholder="cidade" id="" value="<?php echo $row['cidade']?>"><br>
        <input type="text" name="estado" class="form-control" placeholder="estado" id="" value="<?php echo $row['estado']?>"><br>
        <input type="tel" name="tel" class="form-control" placeholder="telefone" id=""  value="<?php echo $row['telefone']?>" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})"><br>
        <input type="tel" name="cel" class="form-control" placeholder="celular" id=""  value="<?php echo $row['celular']?>" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})"><br>
        <input type="text" name="email" class="form-control" placeholder="email" id="" value="<?php echo $row['email']?>" ><br>
        <input type="file" name="foto" id="foto" class="form-control" accept="image/*"><br><br>
        <input type="submit" value="trocar">
    </form>
</body>
</html>