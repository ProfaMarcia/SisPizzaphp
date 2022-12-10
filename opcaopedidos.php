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
                
                    <a href = "opcaopedidos.php"><img src="img/op_pedidos1.png" alt="op-pizza" width="100" height="100"></a>
                
                    <a href = "opcaorelatorios.php"><img src="img/op_relatorios.png" alt="op-relatorios" width="100" height="100"></a>
                    
                    <a href = "carrinhopedidos.php"><img src="img/carrinho.png" alt="op-relatorios" width="100" height="100"></a>
                
                    <a href = "logout.php"><img src="img/sair.png" alt="op-relatorios" width="100" height="100"></a>
                
            
            </center>
     
    <center>
    <table width="800" border="0" bgcolor="#fff" >
    
        <td width="800" valign="top" bgcolor="#ffffff">
           
    
    <center> <table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
        <center><h2>PEDIDOS</h2></center></tr>
            <form name='status' method='post' action=''>
            <input style='background-color: green; color: #ffffff; font-size: 12pt; text-align: center;' name='atendidos' type='submit' value='   Atendidos   ' />
            <input style='background-color: red; color: #ffffff; font-size: 12pt; text-align: center;' name='naoatendidos' type='submit' value='Não Atendidos' />
            <input style='background-color: blue; color: #ffffff; font-size: 12pt; text-align: center;' name='todospedidos' type='submit' value='Todos pedidos' />
         <table width="800" border="0"> 
             <tr><form name='pedidos' method='post' action='atenderpedido.php'>
                 <td align='right' colspan='8'>
                 </td></tr>
           
      
       
                  
       
 <?php
 
            //conectando com o localhost - mysql
            require 'conexao-banco.php';
            
              if (isset($_POST["atendidos"])){
                  
               echo '<tr>
     
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
        <center><b>Inform/TempoEnt:</b></center></td>
        <td bgcolor="orange">
        <center><b>Detalhes</b></center></td>
           
        
    </tr> ';
          
           //$id_cliente é igual ao o id do cliente autenticado na sessão.
            $buscar_query = mysql_query("SELECT * FROM clientes ")or die(mysql_error());//faz a busca com as palavras enviadas


// quando existir algo em '$busca_query' ele realizará o script abaixo.
while ($dados = mysql_fetch_array($buscar_query)) {
  
 
    //Faz a busca com o ID do cliente.
            $busca_pedidos = mysql_query("SELECT * FROM pedidos where status='Atendido' and id_cliente='$dados[id]' ORDER BY codigo ASC")or die(mysql_error());
            
            
          // Exibirá a lista de pedidos pelo ID_ do cliente
          
            while ($ped = mysql_fetch_assoc($busca_pedidos)) {
            
            echo "<tr><td bgcolor='#9FC' width='80' align='center'><font color='red'><b>$ped[codigo]</b></font></td>";
            echo "<td bgcolor='#9FC' width='70' align='center'>$dados[id]</td>";
            echo "<td bgcolor='#9FC' width='90' align='center'>R$ $ped[totalpedido]</td>";
            echo "<td bgcolor='#9FC' width='100' align='center'>$ped[datahoraped]</td>";
            echo "<td bgcolor='#9FC' width='90' align='center'><b>$ped[status]</b></td>";
            echo "<td bgcolor='#9FC' align='center'>$ped[hora_atend]</td>";
            echo "<td bgcolor='#9FC' width='90' align='center'>R$ $ped[troco]</td>";
            echo "<td bgcolor='#9FC' align='center'>$ped[informacao]</td>";
             echo "<td bgcolor='#9FC' align='center'><a href='atenderpedido.php?cod=$ped[codigo]'><img src='img/detalhes.png' width='80' height='40'>
            </a></td></tr>";
             
             
            }  
             
            }  
            
          }
          
           if (isset($_POST["todospedidos"])){
               
               
                echo '<tr>
     
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
        <center><b>Inform/TempoEnt:</b></center></td>
        <td bgcolor="orange">
        <center><b>Detalhes</b></center></td>
           
        
    </tr> ';
            
            //$id_cliente é igual ao o id do cliente autenticado na sessão.
            $buscar_query = mysql_query("SELECT * FROM clientes ")or die(mysql_error());//faz a busca com as palavras enviadas


// quando existir algo em '$busca_query' ele realizará o script abaixo.
while ($dados = mysql_fetch_array($buscar_query)) {
  
 
    //Faz a busca com o ID do cliente.
            $busca_pedidos = mysql_query("SELECT * FROM pedidos where id_cliente='$dados[id]' ORDER BY codigo ASC ")or die(mysql_error());
            
            
          // Exibirá a lista de pedidos pelo ID_ do cliente
          
            while ($ped = mysql_fetch_assoc($busca_pedidos)) {
            
            echo "<tr><td bgcolor='#9FC' width='80' align='center'><font color='red'><b>$ped[codigo]</b></font></td>";
            echo "<td bgcolor='#9FC' width='70' align='center'>$dados[id]</td>";
            echo "<td bgcolor='#9FC' width='90' align='center'>R$ $ped[totalpedido]</td>";
            echo "<td bgcolor='#9FC' width='100' align='center'>$ped[datahoraped]</td>";
            echo "<td bgcolor='#9FC' width='90' align='center'><b>$ped[status]</b></td>";
            echo "<td bgcolor='#9FC' align='center'>$ped[hora_atend]</td>";
            echo "<td bgcolor='#9FC' width='90' align='center'>R$ $ped[troco]</td>";
            echo "<td bgcolor='#9FC' align='center'>$ped[informacao]</td>";
             echo "<td bgcolor='#9FC' align='center'><a href='atenderpedido.php?cod=$ped[codigo]'><img src='img/detalhes.png' width='80' height='40'>
            </a></td></tr>";
             
             
                
             
            }  
            
          }
          
           }
           
           if (isset($_POST["naoatendidos"])){
               
               
                echo '<tr>
     
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
        <center><b>Inform/TempoEnt:</b></center></td>
        <td bgcolor="orange">
        <center><b>Detalhes</b></center></td>
           
        
    </tr> ';
               
               //$id_cliente é igual ao o id do cliente autenticado na sessão.
            $buscar_query = mysql_query("SELECT * FROM clientes ")or die(mysql_error());//faz a busca com as palavras enviadas


// quando existir algo em '$busca_query' ele realizará o script abaixo.
while ($dados = mysql_fetch_array($buscar_query)) {
  
 
    //Faz a busca com o ID do cliente.
            $busca_pedidos = mysql_query("SELECT * FROM pedidos  where status='NaoAtendido' and id_cliente='$dados[id]' ORDER BY codigo ASC")or die(mysql_error());
            
            
          // Exibirá a lista de pedidos pelo ID_ do cliente
          
            while ($ped = mysql_fetch_assoc($busca_pedidos)) {
            
            echo "<tr><td bgcolor='#9FC' width='80' align='center'><font color='red'><b>$ped[codigo]</b></font></td>";
            echo "<td bgcolor='#9FC' width='70' align='center'>$dados[id]</td>";
            echo "<td bgcolor='#9FC' width='90' align='center'>R$ $ped[totalpedido]</td>";
            echo "<td bgcolor='#9FC' width='100' align='center'>$ped[datahoraped]</td>";
            echo "<td bgcolor='#9FC' width='90' align='center'><b>$ped[status]</b></td>";
            echo "<td bgcolor='#9FC' align='center'>$ped[hora_atend]</td>";
            echo "<td bgcolor='#9FC' width='90' align='center'>R$ $ped[troco]</td>";
            echo "<td bgcolor='#9FC' align='center'>$ped[informacao]</td>";
             echo "<td bgcolor='#9FC' align='center'><a href='atenderpedido.php?cod=$ped[codigo]'><img src='img/detalhes.png' width='80' height='40'>
            </a></td></tr>";
             
             
            }  
             
            }  
            
          
           }

           
        ?>
