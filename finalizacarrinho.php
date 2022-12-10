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
                
        <center>
    <table width="800" border="0" bgcolor="#fff" >
    
        <td width="800" valign="top" bgcolor="#ffffff">
     <center> 
            <table width="800"  border="0">
            
            <br>
 
        </table>
          
         
             <?php
        
        
       if(count($_SESSION['carrinho']) == 0){
                 echo "<tr><td align='center'><h3><font color='blue'>O carrinho não pode estar vazio!<br>                 
                    <a href='carrinhopedidos.php'>Voltar para o carrinho</a>
                        </font></h3></td></tr>";
             }else{
      
        echo "<h4> Confira abaixo os dados do cliente e o do pedido.</h4> </center>";  
     $idcliente = $_POST['id'];
     
      $busca_cliente = mysql_query("SELECT * FROM clientes WHERE id='$idcliente'")or die(mysql_error());//faz a busca com as palavras enviadas
            
                        // Exibirá os dados do cliente
            while ($dados = mysql_fetch_assoc($busca_cliente)) {
           echo "<table><tr>
         <td width='250'>ID: <br><font color='red'> $dados[id]</font></td>"; 
    echo "<td width='250'>
          Nome: <br><font color='blue'>$dados[nome]</font></td>";
    echo "<td width='200'>
            CPF: <br><font color='blue'>$dados[cpf]</font></td></tr>";
    echo "<tr><td>
         Endereço: <br><font color='blue'> $dados[endereco]</font></td>";
    echo "<td>N.: <br><font color='blue'> $dados[n_casa]</font></td>";
    echo "<td>Bairro: <br><font color='blue'> $dados[bairro]</font></td></tr>";
    echo "<tr><td>
            Telefone:<br><font color='blue'>  $dados[telefone]</font><br>";
    echo "<td>Email: <br><font color='blue'>  $dados[email]</font></td>";
    echo "<tr><td colspan='3'><hr></td></tr></table>";
    
        }
        
         ?>
         
         <center> <table width='300'>
     <tr>
     <td colspan="6" bgcolor="#32CD32" ><div align="center"><b>Finalizar Carrinho</b></font></div></td>
     </tr>
         
       <tr>
     
        <td bgcolor="orange" >
        <center><b>Codigo</b></center></td>
        <td bgcolor="orange" >
        <center><b>Sabor</b></center></td>
         <td bgcolor="orange" >
        <center><b>Tamanho</b></center></td>
        <td bgcolor="orange" >
        <center><b>Preco</b></center></td>
        <td bgcolor="orange">
	<center><b>Qtde</b></center></td>
        </tr>
          
 <?php
 

 
     include('conexao-banco.php');
     
    
    
     
     
     
     foreach ($_SESSION['carrinho'] as $ProdIns => $Qtde ):
     $Sqlfincarrinho = mysql_query("SELECT * FROM pizzas WHERE codigo='$ProdIns'");
      $ResAs = mysql_fetch_assoc($Sqlfincarrinho);
      $idproduto = $ProdIns;
      $Sabor = $ResAs['sabor'];
      $Tamanho = $ResAs['tamanho'];
      $valor = $_POST['total'];
      $Preco = number_format ($ResAs['preco']*$Qtde,2,",",".");  
      $idcliente = $_SESSION['id_cliente'];
    
    
           
           echo "<tr><td><center>$idproduto</td>";
           echo "<td><center>$Sabor</td>";
           echo "<td><center>$Tamanho</td>";
           echo "<td><center>$Preco</center></td>";
           echo "<td><center>$Qtde</center></td></tr>";
           
  
 endforeach;
  
 



 ?>
 <tr><br>
     <td colspan='6' align='center'><font color="red">Deseja realmente finalizar o pedido?</font></td></tr>
 <tr>
     
 <form name='finaliza' action='gravarpedidos.php' method='post'>
     <tr>
          <td bgcolor='pink' colspan='5' align='right'>
      <?php echo "Total do carrinho:<b> R$
         <input size='8' style='font-size: 16px;' readonly='readonly' name='valor' value='".number_format ($valor,2,",",".")."' id='valor'/> 
             </b></td></tr>";
 
       echo "<tr><td bgcolor='pink' colspan='5' align='right'>Troco:<b>
         <input size='8' style='font-size: 16px;' readonly='readonly' name='troco' value='".$_POST['troco']."' /> 
             </b></td></tr>";
      
      echo "<tr><td bgcolor='pink' colspan='5' align='right'>ID do Cliente:<b>
         <input size='8' style='font-size: 16px;' readonly='readonly' name='id' value='".$_POST['id']."' /> 
             </b></td></tr>";
         
   echo "<tr>          
   <td colspan='6' align='right'>
    <input align='right' type='submit' name='finaliza' value='Finalizar'/></td></tr></form>
     
      <tr>
          
          <td colspan='6' align='center'><a href='carrinhopedidos.php'>Voltar para o carrinho</a></td>
           </tr><br>";
        }   
      ?>    

       </table>
         </table>
     </body>
     </html>