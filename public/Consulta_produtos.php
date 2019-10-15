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

$consulta_produtos = "SELECT id_produto, codigo_produto, nome_produto, preco_unitario, data_cadastro ";
$consulta_produtos .= "FROM tb_produtos ";


if( isset($_GET["nome_produto"]) ){
    $produto = $_GET["nome_produto"];
    $consulta_produtos .= "WHERE nome_produto LIKE '%{$produto}%' ";
   // $consulta_produtos .= "ORDER BY nome_produto ASC ";

    
}

$produtos = mysqli_query($conecta, $consulta_produtos);

if(!$produtos){
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
        <style>
        
            a{
                margin-left: 5px;
            }
        </style>
        
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
             <li><a href="Excluir_produto.php">Excluir --> Produtos</a></li>
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

  
        
      
 <form action="Consulta_produtos.php" method="get">
        <div class="input-group">
        <span class="input-group-addon">Buscar</span>
        <input class="form-control" type="text" name="nome_produto" placeholder="Informe o nome do Produto">    
        </div>
    </form>
        
           
    <table class="table table-hover" style="margin-top: 20px">
        <tr class="info">
        <th scope="col" style="text-align: center">ID</th>    
        <th scope="col" style="text-align: center">CÓDIGO</th>
        <th scope="col" style="text-align: center">PRODUTO</th>
        
        <th scope="col" style="text-align: center"></th>
        <th scope="col" style="text-align: center">PREÇO UNITÁRIO</th>
        <th scope="col" style="text-align: center">CADASTRADO EM</th>    
        <th scope="col" style="text-align: center"></th>
        
        </tr>
       
        
        <?php
      
        while ($registro = mysqli_fetch_assoc($produtos)){
        
            
        ?>
        <tbody>    
        <tr class="active">
        <th style="text-align: center"><?php echo $registro ["id_produto"]?></th>
        <td style="text-align: center"> <?php echo $registro ["codigo_produto"]?></td>    
        <td style="text-align: center"> <?php echo $registro ["nome_produto"]?></td>
       
        <td></td>    
        <td style="text-align: center"> R$ <?php echo $registro ["preco_unitario"]?></td>
        <td style="text-align: center"> <?php echo $registro ["data_cadastro"]?></td>
        <td class="actions">
        
        <a class="btn btn-danger btn-xs" style="float:right"  href="Excluir_produtos.php?codigo=<?php echo $registro["id_produto"]?>">Excluir</a>
        <a class="btn btn-warning btn-xs" style="float:right" href="Vendas_clientes.php?codigo=<?php echo $registro["id_produto"]?>" >Vender</a>
        <a class="btn btn-success btn-xs" style="float:right" href="Alterar_bolos.php?codigo=<?php echo $registro["id_produto"]?>">Editar</a>    
           
        </td>
        </tr>    
        
            
            
        </tbody>
    <?php
        }
        
    ?>
      
        
    </table> 
        
      <a class="btn btn-success btn-xl" style="float:left" href="Cadastro_produtos.php">Novo Item</a>   
    
    </body>
</html>

<?php
    mysqli_close($conecta);
?>
