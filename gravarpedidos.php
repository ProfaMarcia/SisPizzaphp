<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>.::PAINEL DE CONTROLE DO SISPIZZA::.</title>

<?php
error_reporting(0);

session_start();
  
 

 

     include_once('conexao-banco.php');
     
      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
         
      }
       
      //adiciona produto
       
      if(isset($_GET['acao'])){
          
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $cod = intval ($_GET['cod']);
            if(!isset($_SESSION['carrinho'][$cod])){
               $_SESSION['carrinho'][$cod] = 1;
            }else{
               $_SESSION['carrinho'][$cod] += 1;
            }
        
         }
         
      }


//Deleta itens do carrinho
if(isset($_GET['del'])){
    $Del = $_GET['del'];
    unset($_SESSION['carrinho'][$Del]);
}
    
?>

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
                    
                    <a href = "carrinhopedidos.php"><img src="img/carrinho11.png" alt="op-relatorios" width="100" height="100"></a>
                
                    <a href = "logout.php"><img src="img/sair.png" alt="op-relatorios" width="100" height="100"></a>
                
               
            </center>
     
    <center>
    <table width="800" border="0" bgcolor="#fff" >
    
        <td width="800" valign="top" bgcolor="#ffffff">
     

 <?php
 
 echo "<center><h4> Seu pedido foi enviado com sucesso! <br>
        Confira a baixo os dados desse pedido.</h4></center>";
//conectando com o localhost - mysql
include 'conexao-banco.php';

 $troco = $_POST["troco"];
 $valor = $_POST["valor"];
 $idcliente = $_POST["id"];
    
  $Inserirdados = "INSERT INTO pedidos VALUES"."('','$idcliente','$valor','$data_sistema','NaoAtendido','','$troco','')";
           
 mysql_query($Inserirdados,$conect);
  
   foreach ($_SESSION['carrinho'] as $ProdIn => $Qtd ):
     $Sqlgravar = mysql_query("SELECT * FROM pizzas WHERE codigo='$ProdIn'");
      $Res = mysql_fetch_assoc($Sqlgravar);
      $idproduto = $ProdIn;
      $Sabor = $Res['sabor'];
      $Preco = number_format ($Res['preco']*$Qtd,2,",",".");  
      
      $Tamanho = $Res['tamanho']; 
      
      
         
   $InseriItensPed = "INSERT INTO itensvenda VALUES"."('','','$idcliente','$idproduto','$Sabor','$Tamanho','$Preco','$Qtd','$data_sistema')"; 
   //id_venda, idcliente, idprod, sabor, preco, qtde, data/hora         
    
 mysql_query($InseriItensPed,$conect); 
   unset($_SESSION['carrinho']);
 endforeach;


  
  
  $dthragora = $data_sistema;        
            
            //Faz a busca com o ID do cliente.
            $busca_pedidos = mysql_query("SELECT * FROM pedidos where id_cliente='$idcliente' and datahoraped='$dthragora'")or die(mysql_error());
            
            
          // Exibirá a lista de pedidos pelo ID_ do cliente
           
            
            
          
            while ($ped = mysql_fetch_assoc($busca_pedidos)) {
                
                $altpedido = "UPDATE itensvenda SET codigo_pedido='$ped[codigo]' where id_cliente='$idcliente' and datahoraped='$dthragora' ";
    mysql_query($altpedido) or die(mysql_error());
            
                 echo "<center><table><tr><td width='280'> Cód. pedido : <font color='blue'>#$ped[codigo]</font></td>";
            echo "<td width='250'> Total pedido: <font color='blue'>R$ $ped[totalpedido]</font></td></tr>";
            echo "<tr><td>Data e Hora    : <font color='blue'>$ped[datahoraped]</font></td>";
            echo "<td> Status Compra: <font color='blue'>$ped[status]</font></td></tr>";
            echo "<tr><td>Hora atendimento: <font color='blue'>$ped[hora_atend]</font></td>";
            echo "<td>Troco: <font color='blue'>R$ $ped[troco]</font></td></tr>";
            echo "<tr><td colspan='2' align='center'><font color='red'>------------Itens do pedido-------------</font></td></tr>";
                     
               
             
             //Faz a busca com o ID do cliente e pela data e hora da compra.      
               
            $busca_itensped = mysql_query("SELECT * FROM itensvenda where id_cliente='$idcliente' and datahoraped='$dthragora'")or die(mysql_error());
            while ($ip = mysql_fetch_assoc($busca_itensped)) {
            
            echo "<tr><td width='250'>Id pizza:<font color='blue'>#$ip[id_produto]</font></td>";
            echo "<td width='250'>Sabor :<font color='blue'>$ip[sabor]</font></td></tr>";
            echo "<tr><td width='250'>Tamanho :<font color='blue'>$ip[tamanho]</font></td>";
            echo "<td width='250'>Preco :<font color='blue'>R$ $ip[preco]</font></td></tr>";
            echo "<tr><td width='250'>Qtde :<font color='blue'>$ip[qtde]</font></td></tr>";
            echo "<tr><td colspan='2'align='center'><hr></td></tr>"; 
            
            }
            
            } 

?>



</body>
</html>
