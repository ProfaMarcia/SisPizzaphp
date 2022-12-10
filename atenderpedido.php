<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>.::PAINEL DE CONTROLE DO SISPIZZA::.</title>
<script type="text/javascript">
function validaCampo()
{

if(document.pedidos.inform.value==""){
	alert("É obrigatório informar o campo Inform/TempoEnt:!");
	return false;
	}
else
return true;
}
</script>
</head>
<body background="img/pizzafundo2.jpg">
       
        <?php
error_reporting(0);
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
                
                    <a href = "opcaopedidos.php"><img src="img/op_pedidos1.png" alt="op-pizza" width="100" height="100"></a>
                
                    <a href = "opcaorelatorios.php"><img src="img/op_relatorios.png" alt="op-relatorios" width="100" height="100"></a>
                    
                    <a href = "carrinhopedidos.php"><img src="img/carrinho.png" alt="op-relatorios" width="100" height="100"></a>
                
                    <a href = "logout.php"><img src="img/sair.png" alt="op-relatorios" width="100" height="100"></a>
                
            
            </center>
     
    <center>
    <table width="800" border="0" bgcolor="#fff" >
    
        <td width="699" valign="top" bgcolor="#ffffff">
           
    
    <center> <table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
        <center><h2>INFORMAÇOES DO PEDIDO</h2></center></tr>

             <table width="800" border="0"> 
             <tr><form name='pedidos' method='post' action='' onsubmit="return validaCampo(); return false;">
                 <td colspan='9' align='right'></td></tr> 
                    <td colspan='9' align='right'> <a href = "opcaopedidos.php"><img src="img/voltar1.png" alt="op-clientes" width="80" height="40"></a> </td></tr>
                 </td></tr> 
           
        <tr>
     
        <td bgcolor="orange" >
        <center><b>Cód.Pedido</b></center></td>
         <td bgcolor="orange" >
        <center><b>IdCliente</b></center></td>
        <td bgcolor="orange" >
        <center ><b>TotalPedido</b></center></td>
        <td bgcolor="orange">
	<center><b>Data/Hora</b></center></td>
        <td bgcolor="orange">
	<center><b>Status</b></h5></center></td>
	<td bgcolor="orange">
	<center><b>DT/HR-Atend.</b></center></td>
        <td bgcolor="orange">
        <center><b>Troco</b></center></td>
        <td bgcolor="orange">
        <center><b>TempoEntrega</b></center></td>
                
        
    

<?php

include 'conexao-banco.php';
 
   if(isset($_GET['cod'])){
           $codigo = $_GET['cod']; // o código do pedido
        }

 
            //Faz a busca com o código do pedido.
            $busca_pedidos = mysql_query("SELECT * FROM pedidos where codigo='$codigo' ")or die(mysql_error());
            
            
          // Exibirá a lista de pedidos pelo código do pedido
           
            
          
               while ($ped = mysql_fetch_assoc($busca_pedidos)) {
                     
               $buscar_clientes = mysql_query("SELECT * FROM clientes WHERE id='$ped[id_cliente]'")or die(mysql_error());//faz a busca com as palavras enviadas

         if ($ped[status] == NaoAtendido){
            echo '<td bgcolor="orange">
            <center><b>Ação</b></center></td></tr>';
         }
  
        // quando existir algo em '$busca_query' ele realizará o script abaixo.
        while ($dados = mysql_fetch_array($buscar_clientes)) {       
            
            echo "<tr><td bgcolor='#9FC' align='center'><font color='red'><b>$ped[codigo]</b></font></td>";
            echo "<td bgcolor='#9FC' align='center'>$dados[id]</td>";
            echo "<td bgcolor='#9FC' align='center'>R$ $ped[totalpedido]</td>";
            echo "<td bgcolor='#9FC' align='center'>$ped[datahoraped]</td>";
            echo "<td bgcolor='#9FC' align='center'><b>$ped[status]</b></td>";
            echo "<td bgcolor='#9FC' align='center'>$ped[hora_atend]</td>";
            echo "<td bgcolor='#9FC' align='center'>R$ $ped[troco]</td>";
            echo "<td bgcolor='#9FC' align='center'><input name='inform' type='text' value='$ped[informacao]' size='20' maxlength='40' /></td>";
            if ($ped[status] == NaoAtendido){
                echo "<td bgcolor='#9FC' height='20'><input style='background-color: green; color: #ffffff; font-size: 12pt; text-align: center;' name='atender' type='submit' id='alterar' value='Atender' />";
            
            echo "<a href='cancelarpedido.php?cod=$ped[codigo]'><img src='img/cancelar1.png' width='80' height='40'></a> <br>";
           } 
           
           echo "</td></tr>";
            
            
             
                
             
             
           
            echo "<tr><td colspan='8' align='center'><h3><font color='red'>Itens do Pedido</font></h3></td></tr>";
            
            
            
               //Faz a busca com o ID do cliente e pela data e hora da compra.  
             $busca_itensped = mysql_query("SELECT * FROM itensvenda where id_cliente='$ped[id_cliente]' and datahoraped='$ped[datahoraped]'")or die(mysql_error());
            while ($ip = mysql_fetch_assoc($busca_itensped)) {
            
            echo "<tr><td colspan='3' align='center'>Sabor :<font color='blue'>$ip[sabor]</font></td>";
            echo "<td colspan='2' align='center'>Tamanho :<font color='blue'>$ip[tamanho]</font></td>";
            echo "<td colspan='2' align='center'>Preco :<font color='blue'>R$ $ip[preco]</font></td>";
            echo "<td colspan='2' align='center'>Qtde :<font color='blue'>$ip[qtde]</font></td></tr>";
            echo "<tr><td colspan='9' align='center'><hr></td></tr>"; 
            
            }
            
           
    echo "<tr><td colspan='8' align='center'><h3><font color='red'>Dados do Cliente</font></h3></td></tr>";
    echo "<table><tr><td width='250' align='center'>
          Nome: <br><font color='blue'>$dados[nome]</font></td>";
    echo "<td width='100' align='center'>
            CPF: <br><font color='blue'>$dados[cpf]</font></td>";
    echo "<td width='250' align='center'>
         Endereço: <br><font color='blue'> $dados[endereco]</font></td>";
    echo "<td width='80' align='center'>N.: <br><font color='blue'> $dados[n_casa]</font></td>";
    echo "<td width='200' align='center'>Bairro: <br><font color='blue'> $dados[bairro]</font></td>";
    echo "<td width='150' align='center'>
            Telefone:<br><font color='blue'>  $dados[telefone]</font></tr>";
          
    
    
}
            

         } 
        
          if (isset($_POST["atender"])){
        
	   $inform =  $_POST["inform"];

    $altpedido = "UPDATE pedidos SET status='Atendido', hora_atend='$data_sistema', informacao='$inform' WHERE codigo='$codigo'";
    mysql_query($altpedido) or die(mysql_error());

        echo "<script>
        alert('Atendimento realizado com sucesso!');
        window.location='http://localhost/SisPizzaTccphp/opcaopedidos.php';
        </script>";
       
        }
       
             
            
            
            ?>
