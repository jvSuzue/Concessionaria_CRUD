<?php 
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Formulário Concessionária</title>
</head>

<body>
    <style>
    body {
        background-image: url('background.jpg');
        background-image: opacity 0.5;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    </style>
    <h1 class=" container justify-content-center"> Cadastro de automóveis </h1>
    <div class=" container justify-content-center">
        <?php 
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
    }
    ?>
    </div>

    <div class="container justify-content-center">
        <form method="POST" action="insere_automovel.php">
            <div class="form-group">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">
                    <h2>Veículo</h2>
                </label>
                <div>
                    <input type="text" name="name" class="form-control" placeholder="Digite o nome do veículo">
                </div>
            </div>

            <div class="form-group">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">
                    <h2>PLaca</h2>
                </label>
                <div>
                    <input type="text" name="placa" class="form-control" placeholder="Digite o número da pLaca">
                </div>
            </div>

            <div class="form-group">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">
                    <h2>Chassi</h2>
                </label>
                <div>
                    <input type="text" name="chassi" class="form-control" placeholder="Digite o número do chassi">
                </div>
            </div>

            <div class="form-group">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">
                    <h2>Montadora</h2>
                </label>
                <select name="montadora" class="form-control">
                    <div>
                        <?php 

                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "concessionaria";
                
                  $con = new mysqli($servername, $username, $password, $dbname);
                 
                  if (mysqli_connect_errno()) {
                      echo "falha de conexão.. " .mysqli_connect_error();
                  }

                  $sql = "SELECT * FROM montadoras";
                  $result = mysqli_query($con, $sql);                
                  
                  
                  echo "<option> Escolha uma montadora </option>";
                    while ($row = mysqli_fetch_array($result)){
                      echo"<option>$row[mont]</option>";
                    }                                     
                    mysqli_close($con);                    
                  ?>

                    </div>
                </select><br>

                <div class="form-group">
                    <input type="submit" value="Cadastrar" name="submit" class="btn btn-primary  form-control">
                </div>
            </div>

        </form>
    </div>
    <div class="container">
        <form method="POST" action="insere_montadora.php">
            <div class="form-group">
                <label for="colFormLabel" class=" col-form-label">
                    <h5>Adicionar nova montadora</h5>
                </label>
                <div>
                    <input type="text" name="mont" class="form-control" placeholder="Digite o nome da montadora">
                </div>
            </div>
            <div>
                <div class="form-group">
                    <input type="submit" value="Adicionar" name="submit" class="btn btn-secondary">
                </div>
            </div>
        </form>
    </div>
    </div><br><br><br>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
    </script>


    <div class="container form-group">
        <label for="colFormLabel" class=" col-form-label">
            <h5>Automóveis Cadastrados</h5>
        </label>
        <div class="colFormLabel">
            <table class="table table-striped table-hover table-borderless">
                <thead class="font color: red">
                    <tr>
                        <th>Veículo</th>
                        <th>Placa</th>
                        <th>Chassi</th>
                        <th>Montadora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $sql_automoveis = "SELECT * FROM automoveis";
                    $resultado = mysqli_query($conn,$sql_automoveis);
                    while($dados = mysqli_fetch_array($resultado)):
                        ?>
                    <tr>
                        <td><?php echo $dados['nome'];?></td>
                        <td><?php echo $dados['placa'];?></td>
                        <td><?php echo $dados['chassi'];?></td>
                        <td><?php echo $dados['montadora'];?></td>
                        <td><a href="editar.php?codigo=<?php echo $dados['codigo'];?>" class="btn btn-primary"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path
                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                </svg></a></td>
                        

                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $dados['codigo'];?>"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg></button></td>
                    </tr>

                    <div id="myModal<?php echo $dados['codigo'];?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">                            
                            <div class="modal-content">
                                <div class="modal-header">                                    
                                    <h4 class="modal-title text-danger">Deletar Registro:  <?php echo $dados['nome'];?></h4>
                                </div>
                                <div class="modal-body">
                                    <p class="text-primary">Tem certeza de que deseja deletar?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                                <form action="delete.php" method="POST">
                                    <input type="hidden" name="codigo" value="<?php echo $dados['codigo'];?>">
                                    <button type="submit" name="deletar" class="btn btn-danger">Deletar</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>



</body>

</html>