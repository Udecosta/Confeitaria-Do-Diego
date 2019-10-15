    <?php
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "dba_confeitaria";
        $conecta = mysqli_connect($servidor,$usuario,$senha,$banco);

       if(mysqli_connect_errno()){
           die("Falha na Conexão: " . mysqli_connect_errno());
       }else{
           
       }

    ?>


<?php

    $select = "SELECT * ";
    $select .= "FROM tb_produtos ";
    if(isset($_GET["cod_produto"])){
        $id = $_GET["cod_produto"];
        $select .= "WHERE id_produto = {$id} ";
    }

    $clientes = mysqli_query($conecta, $select);
    
    if(!$clientes){
        die("Erro na Consulta");
    }
    $lista_clientes = mysqli_fetch_assoc($clientes)
    


?>
    <?php

    //$select = "SELECT nome_cliente ";
    //$select .= "FROM tb_clientes ";
    //$lista_clientes = mysqli_query ($conecta, $select);
    
    //if(!$lista_clientes){
      //  die("Erro na Consulta");
    //}
    



    /////////////////////////////
    $inserir = "DELETE FROM tb_produtos ";
    if( isset($_POST["cod_produto"])){
        $excID = $_POST["cod_produto"];
        
        // $id = $_POST["codigo"];
     
        $inserir .= "WHERE id_produto = {$excID}";
        
       
        $operacao_inserir = mysqli_query($conecta,$inserir);

        
        if(!$operacao_inserir){
                die("Falha no banco de dados");
           
        }
            header("location:Consulta_produtos.php  ");
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
            <h2 style="text-align:center">Excluir Cliente</h2>
         <form class="form-horizontal" action="Excluir_produto.php" method="post">
             <br>
             <label>SELECIONE O PRODUTO QUE DESEJA EXCLUIR</label>
             <br>
             <br>
             <select class="form-control" name="cod_produto">
                 
                <?php
               
                 while($linha = mysqli_fetch_assoc($clientes)){
                    
                ?>
                
                 <option value="<?php echo $linha["id_produto"]; ?>">
                     Produto: <?php echo utf8_decode($linha["nome_produto"]); ?>
                     
                 </option>
                 
                <?php
                }
                ?>                
            </select>
            
            <br> 
             
             <input type="submit" class="btn btn-default" value="Excluir">
             <a class="btn btn-default btn-xm" href="Consulta_produtos.php">Cancelar</a>


         </form>
        </div>

        </body>
    </html>

    <?php
        mysqli_close($conecta);
    ?>
