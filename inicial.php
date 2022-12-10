
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>.::PAINEL DE CONTROLE DO SISPIZZA::. </title>
</head>
 
<body background="img/pizzafundo2.jpg">
       
    <?php

session_start();

 if( $_SESSION['nome_adm'])
                        {
      //o usuário está logado entao :
     echo "<font color='#009'><h3>Logado: </font>".$_SESSION['nome_adm']."<br>"; 
         // Retorna o país e cidade
date_default_timezone_set('Brazil/East');
date_default_timezone_set('America/Manaus');
// Data e hora atual horário de manaus
echo "<font color='#009'>Hoje: </font>".$data_sistema = date('d/m/Y H:i');
                               
                        }else{
                                //senão estiver logado o adm será redireciona para o login.
                                header('Location: login.php');//aqui vai para a página de login.
                        }
         
?>
   
    <center>
        <h2>PAINEL DE CONTROLE DO SISPIZZA</h2>
    
          <a href = "cadastropizzas.php"><img src="img/op_pizzas.png" alt="op-pizza" width="100" height="100"></a>
                
                    <a href = "cadastrofuncionarios.php"><img src="img/op_funcionario.png" alt="op-clientes" width="100" height="100"></a>
               
                    <a href = "cadastroclientes.php"><img src="img/op_clientes.png" alt="op-clientes" width="100" height="100"></a>
                
                    <a href = "opcaopedidos.php"><img src="img/op_pedidos.png" alt="op-pizza" width="100" height="100"></a>
                
                    <a href = "opcaorelatorios.php"><img src="img/op_relatorios.png" alt="op-relatorios" width="100" height="100"></a>
                    
                    <a href = "carrinhopedidos.php"><img src="img/carrinho.png" alt="op-relatorios" width="100" height="100"></a>
                
                    <a href = "logout.php"><img src="img/sair.png" alt="op-relatorios" width="100" height="100"></a>
                </center>
     
<center>
    <table width="800" border="0" bgcolor="#fff" >
 
        
        
<?php
echo "<tr><td colspan='3' border='0' align='center'>";
echo "<h1>Seja Bem-vindo ".$_SESSION['nome_adm']." </h1></td></tr>";
echo "<tr><td colspan='3' border='0' align='center'>
    <h3>Esse é seu Painel de Controle onde irá cadastrar cardápio de pizzas,<br> 
    preços, clientes, promoções e atender os pedidos dos clientes.<br></h3>";
echo "<img src='img/logoand.png' alt='op-relatorios' width='280' height='250'></td></tr>";




?>
        
</table>
        
    </center>
        