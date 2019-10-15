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

$consulta_clientes = "SELECT nome_cliente as 'Cliente', sum(qtde_vendida) as 'Quantidade Adquirida', nome_produto, sum(preco_unitario * qtde_vendida) as 'Valor Total da Compra', hora_venda ";
$consulta_clientes .= "FROM tb_vendas a ";
$consulta_clientes .= "INNER JOIN tb_clientes b ";
$consulta_clientes .= "ON a.id_cliente = b.id_cliente ";
$consulta_clientes .= "INNER JOIN tb_produtos c ";
$consulta_clientes .= "ON a.id_produto = c.id_produto ";
$consulta_clientes .= "GROUP BY a.id_produto ";
$consulta_clientes .= "ORDER BY nome_cliente ";





if( isset($_GET["Cliente"]) ){
   $cliente = $_GET["Cliente"];
  
}

$clientes = mysqli_query($conecta, $consulta_clientes);

if(!$clientes){
    die("Falha na consulta do Banco de Dados");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>

    <body style="margin:10px">

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

        
    <!--
    <form action="Vendas.php" method="get">
        <div class="input-group">
        <span class="input-group-addon">Buscar</span>
        <input class="form-control" type="text" name="nome_produto" placeholder="Informe o nome do Produto">    
        </div>
    </form>
    -->
    <table class="table table-hover" style="margin-top: 20px">
        
        <tr class="success">
        <th scope="col" style="text-align: center">Nome Do Cliente</th>
        <th scope="col" style="text-align: center">Nome Do Produto</th>
        <th scope="col" style="text-align: center">Quantidade Vendida</th>
        <th scope="col" style="text-align: center">Valor Total</th>
        <th scope="col" style="text-align: center">Hora da Venda</th>
        </tr>
      
       
        
        <?php
      
        while ($registro = mysqli_fetch_assoc($clientes)){
        
            
        ?>
        <tbody>
            
        <tr class="active">
        <td scope="row" style="text-align: center"><?php echo $registro ["Cliente"]?></td>
        <td style="text-align: center"> <?php echo $registro ["nome_produto"]?></td>
        <td scope="row" style="text-align: center"><?php echo $registro ["Quantidade Adquirida"]?></td>
        <td style="text-align: center"> R$ <?php echo $registro ["Valor Total da Compra"]?></td> 
        <td style="text-align: center"> <?php echo $registro ["hora_venda"]?></td>
        
         </tr>    
        
            
        </tbody>
    <?php
        }
        
    ?>
        
    </table>
        
    </body>
</html>

<?php
    mysqli_close($conecta);
?>
