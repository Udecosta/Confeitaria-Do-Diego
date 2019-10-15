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

if (isset ($_POST["nome_produto"])){
    
    $excID = $_POST["codigo"];
    
    $exclusao = "DELETE FROM tb_produtos ";
    $exclusao .= "WHERE id_produto = {$excID}";
    
    $info_exclusao = mysqli_query($conecta, $exclusao);
    
    if(!$info_exclusao){
        die("Falha na Consulta");
    }else{
        header("location:Consulta_produtos.php");
    }
    
}



$tr = "SELECT * FROM tb_produtos ";

if(isset($_GET["codigo"])){
    $id = $_GET["codigo"];
    $tr .= "WHERE id_produto = {$id} ";
    
}

$con_cliente = mysqli_query($conecta, $tr);

if(!$con_cliente){
    die("Erro na Consulta do Banco de Dados");
}

$info_produtos = mysqli_fetch_assoc($con_cliente);
//print_r ($info_clientes);

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

    <body style="margin: 10px">
        
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
            <h2 style="text-align:center">Excluir Produto</h2>
            <form class="form-horizontal" action="Excluir_produtos.php" method="post">
                            
            <label for="cod_produto">Código Do Produto:</label>
            <input type="text" class="form-control" value="<?php echo utf8_encode ($info_produtos["codigo_produto"]) ?>" name="cod_produto" id="cod_produto">
            
            <label for="nome_produto">Descrição Do Produto:</label>
            <input type="text" class="form-control" value="<?php echo utf8_encode ($info_produtos["nome_produto"]) ?>" name="nome_produto" id="nome_produto">
                        
            <br> 
            <input type="hidden" name="codigo" value="<?php echo $info_produtos["id_produto"] ?>">
            <input type="submit" class="btn btn-default" value="Confirmar Exclusão">
            <a class="btn btn-default btn-xm" href="Consulta_produtos.php">Cancelar</a>    
        </form>
        </div>
        
    
    </body>
</html>

<?php
    mysqli_close($conecta);
?>
