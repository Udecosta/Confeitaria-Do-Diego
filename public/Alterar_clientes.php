<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "dba_confeitaria";
    $conecta = mysqli_connect($servidor,$usuario,$senha,$banco);

   if(mysqli_connect_errno()){
       die("Falha na Conexão: " . mysqli_connect_errno());
   }

?>

<?php

    $alterar = "SELECT * ";
    $alterar .= "FROM tb_clientes ";

    if(isset ($_GET["codigo"])){
    $id = $_GET["codigo"];
    $alterar .= "WHERE id_cliente = {$id} ";  
    }else{
    
    }
    
    $con_clientes = mysqli_query($conecta, $alterar);

    if(!$con_clientes){
    die("Erro na Consulta");
    }

    $info_clientes = mysqli_fetch_assoc ($con_clientes);


    if (isset ($_POST["nome_cliente"])){
    print_r ($_POST);
    
    $nome = utf8_decode ($_POST ["nome_cliente"]);
    $rg = utf8_decode ($_POST ["rg_cliente"]);
    $sexo = utf8_decode ($_POST ["sexo_cliente"]);
    $endereco = utf8_decode ($_POST ["endereco_cliente"]);
    $numero = $_POST ["numero_cliente"];
    $telefone = $_POST ["telefone_cliente"];
    $email = utf8_decode ($_POST ["email_cliente"]);
    //$cadastro = utf8_decode ($_POST ["data_cadastro"]);
    $cliID = $_POST ["codigo"]; 
    
    
    $alteracao = "UPDATE tb_clientes ";
    $alteracao .= "SET ";
    $alteracao .= "nome_cliente = '{$nome}', ";
    $alteracao .= "rg_cliente = '{$rg}', ";
    $alteracao .= "sexo_cliente = '{$sexo}', ";
    $alteracao .= "endereco_cliente = '{$endereco}', ";
    $alteracao .= "numero_cliente = '{$numero}', ";
    $alteracao .= "telefone_cliente = '{$telefone}', ";
    $alteracao .= "email_cliente = '{$email}' ";
    //$alteracao .= "data_cadastro = '{$cadastro}' ";
    $alteracao .= "WHERE id_cliente = {$cliID} ";
    
    $operacao_alterar = mysqli_query($conecta, $alteracao);
    
    if(!$operacao_alterar){
        die("Erro na consulta do banco de dados");
    }else{
        header("location:Consulta_clientes.php");
    }
    }

    


?>



<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Confeitaria do Diego</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="main.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>

    <body>
        
 <nav class="navbar navbar-inverse" style="background-color: #392929">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="Consulta_produtos.php">Confeitaria</a>
      </div>
        <ul class="nav navbar-nav">
           <li class="active"><a href="Consulta_produtos.php" style="background-color: #ae8e45;color: black">Bolos</a></li>
            
            
             <li class="dropdown">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#">
             Clientes <span class="caret"></span></a>
             <ul class="dropdown-menu" role="menu">
             <li><a href="Consulta_clientes.php">Consultar --> Clientes</a></li>
             <li><a href="Cadastro_clientes.php">Cadastrar --> Clientes</a></li>
             </ul>
                
            
             <li class="dropdown">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#">
             Produtos <span class="caret"></span></a>
             <ul class="dropdown-menu" role="menu">
             <li><a href="Consulta_produtos.php">Consultar --> Produtos</a></li>
             <li><a href="Cadastro_produtos.php">Cadastrar --> Produtos</a></li>
             </ul>    
             
                 
                 
             <li class="dropdown">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#">
             Vendas <span class="caret"></span></a>
             <ul class="dropdown-menu" role="menu">
             <li><a href="Vendas_Por_produto.php"> Vendas --> Produtos --> Faixa de Hora </a></li>
             <li><a href="Vendas.php"> Vendas --> Resumo </a></li>
             <li><a href="Visualizar_Vendas_Clientes.php">Visualizar --> Vendas --> Clientes</a></li>                        
             <li><a href="Vendas_por_agrupamento.php">Visualizar --> Vendas --> Clientes --> Por --> Agrupamento</a></li>
            <li><a href="Top_vendas.php">Visualizar --> Ranking --> Clientes</a></li>          
             </ul>
                 <li class=""><a href="Dados_encomendas.php">Pedidos</a></li>
             </ul>
        
           <ul class="nav navbar-nav navbar-right">
         <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>

  

    
        
        <div class="container">
        <h2 style="text-align:center">Alterar Cadastro</h2>
            <form class="form-horizontal" action="Alterar_clientes.php" method="post">
                            
            <label for="nome">Nome do Cliente:</label>
            <input type="text" class="form-control" value="<?php echo utf8_encode ($info_clientes["nome_cliente"]) ?>" name="nome_cliente" id="nome" required>
                
            <label for="rg">RG do Cliente:</label>
            <input type="text" class="form-control" value="<?php echo utf8_encode ($info_clientes["rg_cliente"]) ?>" name="rg_cliente" id="rg" required>
                        
            <label for="sexo">Sexo do Cliente:</label>
            <input type="text" class="form-control" value="<?php echo utf8_encode ($info_clientes["sexo_cliente"]) ?>" name="sexo_cliente" id="sexo" required>
            
            <label for="endereco">Endereço do Cliente:</label>
            <input type="text" class="form-control" value="<?php echo utf8_encode ($info_clientes["endereco_cliente"]) ?>" name="endereco_cliente" id="endereco" required>
            
            <label for="numero">Numero do Cliente:</label>
            <input type="text" class="form-control" value="<?php echo utf8_encode ($info_clientes["numero_cliente"]) ?>" name="numero_cliente" id="numero" required>
            
            <label for="telefone">Telefone do Cliente:</label>
            <input type="text" class="form-control" value="<?php echo utf8_encode ($info_clientes["telefone_cliente"]) ?>" name="telefone_cliente" id="telefone" required>
            
            <label for="email">Email do Cliente:</label>
            <input type="text" class="form-control" value="<?php echo utf8_encode ($info_clientes["email_cliente"]) ?>" name="email_cliente" id="email" required>
            
            <br> 
            <input type="hidden" name="codigo" value="<?php echo $info_clientes["id_cliente"] ?>">
            <input type="submit" value="Confirmar Alteração">
        </form>
        </div>
    
    </body>
</html>

<?php
    mysqli_close($conecta);
?>
