<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body class="p-5">
    <div class="container text-center mb-3 border">
        <div class="row align-items-start">
            <h1 align="center-2" class="col" style="margin-bottom: 50px;">Agendas</h1>
                <?php
                    require "includes/conexao.php";
                    $sql = "SELECT * FROM agenda ORDER BY id_agenda";

                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);

                    mysqli_close($con);
                ?>
            <!--<a href="index.php" class="p-2 col-2"><button type="button" class="btn-close" disabled aria-label="Close"></button></a>-->
        
            <table align="center" class="col-3 table table-striped border border-black border-1 p-2" style="width: 1200px;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Apelido</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Alterar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($result as $key => $row){
                            if(isset($row['foto']) && $row['foto'] != '')$to_show = "<img width='50px' height='50px' src='".$row['foto']."'>";
                            else $to_show = '';
                            echo "<tr scope='row'>";
                            echo "<td>".$row['nome']."</td>";
                            echo "<td>".$row['apelido']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['telefone']."</td>";
                            echo "<td>".$row['endereco']."</td>";
                            echo "<td>".$row['bairro']."</td>";
                            echo "<td>".$row['cidade']."</td>";
                            echo "<td>".$row['estado']."</td>";
                            echo "<td>".$row['celular']."</td>";
                            echo "<td>".$to_show."</td>";
                            echo "<td><a href='altera_agenda.php?id_ag=". $row['id_agenda'] ."'><button class='btn btn-primary'>Mudar</button></a></td>";
                            echo "<td><a href='excluir_agenda.php?id_ag=". $row['id_agenda'] ."'><button class='btn btn-danger'>Excluir</button></a></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>