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

    if( isset($_POST["nome_cliente"])){
        $nome = $_POST["nome_cliente"];
        $rg = $_POST["rg_cliente"];
        $sexo = $_POST["sexo_cliente"];
        $endereco = $_POST["endereco_cliente"];
        $numero = $_POST["numero_cliente"];
        $telefone = $_POST["telefone_cliente"];
        $email = $_POST["email_cliente"];
        $cadastro = $_POST["data_cadastro"];

        $inserir = "INSERT INTO tb_clientes ";
        $inserir .= "(id_cliente, nome_cliente, rg_cliente, sexo_cliente, endereco_cliente, numero_cliente, telefone_cliente, email_cliente) ";
        $inserir .= "VALUES ";
        $inserir .= "('','$nome', '$rg' ,'$sexo' ,'$endereco', '$numero', '$telefone', '$email')";

        $operacao_inserir = mysqli_query($conecta,$inserir);

        if(!$operacao_inserir){
             die("Falha no banco de dados");
        }else{
            header("location:Consulta_clientes.php");
        }

     }

    ?>

    <!doctype html>
    <html>
        <head>
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
        
        <style>
            label{
                margin: 5px;
            }
        </style>

        <body style="margin: 10px">
                
  <nav class="navbar navbar-inverse" style="background-color: #392929">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="Consulta_produtos.php">Confeitaria</a>
      </div>
        <ul class="nav navbar-nav">
           <li class="active"><a href="Cadastro_produtos.php" style="background-color: #ae8e45;color: black">Bolos</a></li>
            
            
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
            <h2 style="text-align:center">Cadastro De Clientes</h2>
         <form class="form-horizontal" action="Cadastro_clientes.php" method="post">

             <label for="text">Nome</label>
             <input type="text" class="form-control" name="nome_cliente" placeholder="Informe o Nome do Cliente" required>
             <label for="text">RG</label>
             <input type="text" class="form-control" name="rg_cliente" placeholder="Informe o RG do Cliente" required>
             <label for="text">Sexo</label>
             <input type="text" class="form-control" name="sexo_cliente" placeholder="Informe o Sexo do Cliente" required>
             <label for="text">Endereço</label>
             <input type="text" class="form-control" name="endereco_cliente" placeholder="Informe o Endereço do Cliente" required>
             <label for="text">Numero</label>
             <input type="text" class="form-control" name="numero_cliente" placeholder="Informe o Numero do Cliente" required>
             <label for="text">Telefone</label>
             <input type="text" class="form-control" name="telefone_cliente" placeholder="Informe o Telefone do Cliente" required>
             <label for="text">Email</label>
             <input type="text" class="form-control" name="email_cliente" placeholder="Informe o Email do Cliente" required>
             <input type="hidden" class="form-control" name="data_cadastro" placeholder="Informe o Email do Cliente">
             <br>
             <input type="submit" class="btn btn-default" value="inserir">
             <a class="btn btn-default btn-xm" href="Consulta_clientes.php">Cancelar</a>

         </form>
        </div>

        </body>
    </html>

    <?php
        mysqli_close($conecta);
    ?>
