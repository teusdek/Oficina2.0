<!DOCTYPE HTML>
<html lang="pt-br">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="styles.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Oficina 2.0</title>
  <link rel="shortcut icon" href="/Codifar-/img/logoof.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/60f7e7de8a.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
    include 'conexao.php';

    $parametro = addslashes(filter_input(INPUT_GET, "parametro"));

    if ($parametro){
      $sql= ("SELECT * FROM `oficina` WHERE  cliente LIKE '$parametro' OR vendedor LIKE '$parametro' ORDER BY datahora");
      $sql = mysqli_query($conexao,$sql);
    } else {
      $sql = ("SELECT * FROM `oficina` ORDER BY datahora ASC");
      $sql = mysqli_query($conexao,$sql);

    }

    $linha = mysqli_fetch_assoc($sql);
    $total = mysqli_num_rows($sql);
    
  ?>
  <div>
    <div class="topo">
      <img src="/Codifar-/img/LOGO.png" alt>
    </div>
    <div class="meio">
      <h1 class="titulo">Lista De Clintes</h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Cliente</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Telefone-Cliente</th>
            <th scope="col">Descrição Orçamento</th>
            <th scope="col">Data-hora</th>
            <th scope="col">Valor Orçamento</th>
            <th>
        <form action="<?php echo $_SERVER['PHP_SELF']?>">
          <input type="text" name="parametro">
          <input type="submit" class="btn btn-primary" value="Buscar">
        </form></th>
        <th scope="col"><a href="cadastro_cliente.html">Cadastrar Cliente</a></th>
          </tr>
        </thead>
            <?php

            if ($total){ do{

            ?>
            <tr>
              <td><?php echo $linha['cliente'] ?></td>
              <td><?php echo $linha['vendedor'] ?></td>
              <td><?php echo $linha['telefone'] ?></td>
              <td><?php echo $linha['descricao'] ?></td>
              <td><?php echo $linha['datahora'] ?></td>
              <td>$<?php echo $linha['valor'] ?></td>
              <td></td>
              <td><a class="btn btn-danger btn-sm"  href="<?php echo "delete.php?id=". $linha['ID']?>"  role="button"><i class="far fa-trash-alt"></i> Deletar</a></td>
            </tr>
            <?php

            } while ($linha = mysqli_fetch_assoc($sql));
              mysqli_free_result($sql);}
              mysqli_close($conexao);
            
            ?>    
      </table>
    </div>
    <div class="rodape">
      <p>&copy;Teusdek</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"></script>
</body>

</html>