<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>.::PAINEL DE CONTROLE DO SISPIZZA::.</title>
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
                
                    <a href = "opcaorelatorios.php"><img src="img/op_relatorios1.png" alt="op-relatorios" width="100" height="100"></a>
                    
                    <a href = "carrinhopedidos.php"><img src="img/carrinho.png" alt="op-relatorios" width="100" height="100"></a>
                
                    <a href = "logout.php"><img src="img/sair.png" alt="op-relatorios" width="100" height="100"></a>
                
            
            </center>
     
    <center>
    <table width="800" border="0" bgcolor="#fff" >
    
        <td width="800" valign="top" bgcolor="#ffffff">
          
        
        <center> <table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
        <center><h2>ELOGIOS DOS CLIENTES</h2></center></tr>
<?php
 
include 'conexao-banco.php';

  echo '<form name="mensagens" method="post" action="'.$_SERVER["PHP_SELF"].'">';
  
   echo "<center><table><tr><td align='center' colspan='2'><a href='elogios.php'><img src='img/elogios1.png' width='100' height='100'></a></td> ";
    echo "<center><td align='center'><a href='reclamacoes.php'><img src='img/reclamacoes.png' width='100' height='100'></a></td> ";
    echo "<center><td align='center' colspan='2'><a href='duvidas.php'><img src='img/dúvidas.png' width='100' height='100'></a></td></tr> "; 
      

  
  echo '<tr>
     <td bgcolor="orange">
	<center><b>Nome do cliente</b></center></td>
     <td bgcolor="orange">
	<center><b>Id cliente</b></center></td>
        <td bgcolor="orange">
	<center><b>E-mail</b></center></td>
        <td bgcolor="orange">
	<center><b>Mensagens</b></center></td>
        <td bgcolor="orange">
	<center><b>Data/Hora</b></center></td></tr>';
 
 
$contato_cliente = mysql_query("SELECT * FROM clientes")or die(mysql_error());
      while ($cc = mysql_fetch_array($contato_cliente)) { 
          
          
  $mensagens = mysql_query("SELECT * FROM contato where id_cliente='$cc[id]' and assunto='Elogios'"); 
      
            
      while ($ms = mysql_fetch_array($mensagens)) {
 
           
    echo "<tr><td bgcolor='#9FC' width='300' align='center'>$cc[nome]</td> 
          <td bgcolor='#9FC' width='100' align='center'>$cc[id]</td> 
          <td bgcolor='#9CF' width='200' align='center'>$ms[email]</td>
          <td bgcolor='#9CF' width='200' height='80' align='center'><textarea  cols='20' rows='4'> $ms[mensagem]</textarea></td>
          <td bgcolor='#9FC' align='center'>$ms[dthrcontato]</td></tr>";

   
 
   
     }

      
      
 
}
   
       
?>
