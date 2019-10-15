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

$consulta_clientes = "SELECT id_cliente, nome_cliente, rg_cliente, sexo_cliente, endereco_cliente, numero_cliente, telefone_cliente, email_cliente, data_cadastro ";
$consulta_clientes .= "FROM tb_clientes ";

if( isset($_GET["nome_cliente"]) ){
    $cliente = $_GET["nome_cliente"];
    $consulta_clientes .= "WHERE nome_cliente LIKE '%{$cliente}%' ";
    
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
    
    <style>
        
            a{
                margin-left: 5px;
                
            }
        </style>
        
    </head>
    

    <body style="margin:10px;">

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

  
        
    
    <form action="Consulta_clientes.php" method="get">
        <div class="input-group">
        <span class="input-group-addon">Buscar</span>
        <input class="form-control" type="text" name="nome_cliente" placeholder="Informe o nome do Cliente">    
        </div>
    </form>
    
    <table class="table table-hover" style="margin-top: 20px">
        
        <tr class="success">
        <th scope="col" style="text-align: center">ID</th>    
        <th scope="col" style="text-align: center">CLIENTE</th>
        <th scope="col" style="text-align: center">RG</th>    
        <th scope="col" style="text-align: center">SEXO</th>
        <th scope="col" style="text-align: center">ENDEREÇO</th>
        <th scope="col" style="text-align: center">NÚMERO</th>
        <th scope="col" style="text-align: center">TELEFONE</th>
        <th scope="col" style="text-align: center">EMAIL</th>
        <th scope="col" style="text-align: center">CADASTRO</th>    
        <th scope="col"></th>
        <th scope="col"></th>
        
        </tr>
      
       
        
        <?php
      
        while ($registro = mysqli_fetch_assoc($clientes)){
        
            
        ?>
        <tbody>
            
        <tr class="active">
        <th scope="row"><?php echo $registro ["id_cliente"]?></th>
        <td style="text-align: center"> <?php echo $registro ["nome_cliente"]?></td>
        <td style="text-align: center"> <?php echo $registro ["rg_cliente"]?></td>    
        <td style="text-align: center"> <?php echo $registro ["sexo_cliente"]?></td>
        <td style="text-align: center"> <?php echo $registro ["endereco_cliente"]?></td>
        <td style="text-align: center"> <?php echo $registro ["numero_cliente"]?></td> 
        <td style="text-align: center"> <?php echo $registro ["telefone_cliente"]?></td> 
        <td style="text-align: center"> <?php echo $registro ["email_cliente"]?></td> 
        <td style="text-align: center"> <?php echo $registro ["data_cadastro"]?></td>
        <td></td>    
        <td class="actions">
        <a class="btn btn-danger btn-xs" style="float:right" href="Excluir_clientes.php?codigo=<?php echo $registro["id_cliente"]?>">Excluir</a> 
        <a class="btn btn-success btn-xs" style="float:right" href="Alterar_clientes.php?codigo=<?php echo $registro["id_cliente"]?>">Editar</a>   
        </td>
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
