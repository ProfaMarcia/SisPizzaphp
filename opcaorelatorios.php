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
        <center><h2>RELATÓRIO DE VENDAS</h2></center></tr>

             <table width="800" border="0"> 
             <tr><form name='pedidos' method='post' action=''>
                 <td align='right' colspan='8'>
                 </td></tr> 
   <?php 
   
   
    include 'conexao-banco.php';
   
    echo "<form name='status' method='post' action='relatorios.php'>
            <input style='background-color: green; color: #ffffff; font-size: 12pt; text-align: center;' name='vendapizzas' type='submit' value='Venda de Pizzas' />";
    
     echo "<input style='background-color: green; color: #ffffff; font-size: 12pt; text-align: center;' name='compraclientes' type='submit' value='Compras dos clientes' />";
    
      echo "<input style='background-color: green; color: #ffffff; font-size: 12pt; text-align: center;' name='mensagensclientes' type='submit' value='Mensagens dos clientes' />";

   
  // Se clicar no botao vendapizzas mostrará o total da vendas das mesma pelo id_produto
   
  if(isset($_POST["vendapizzas"])){
         
        echo ' <tr>     
        <td bgcolor="orange" >
        <center><b>Cód.Pizza</b></center></td>
         <td bgcolor="orange" >
        <center><b>Sabor</b></center></td>
        <td bgcolor="orange" >
        <center ><b>Tamanho</b></center></td>
        <td bgcolor="orange">
	<center><b>Preço</b></center></td>
        <td bgcolor="orange">
	<center><b>Total de vendas</b></center></td>
       <td bgcolor="orange">
	<center><b>Qtde de vendas</b></center></td>
          </tr>';
                   
 
$busca_query = mysql_query("SELECT * FROM pizzas")or die(mysql_error());//faz a busca com as palavras enviadas

// quando existir algo em '$busca_query' ele realizará o script abaixo.
while ($pes = mysql_fetch_array($busca_query)) {
         
   
          
    echo "<tr><td bgcolor='#9FC' align='center'>$pes[codigo]</td>"; 
    echo "<td bgcolor='#9FC' align='center'>$pes[sabor]</td>";
    echo "<td bgcolor='#9FC' align='center'>$pes[tamanho]</td>";
    echo "<td bgcolor='#9FC'   width='100' align='center'> R$ ".number_format($pes['preco'],2,",",".")."</td>";
   
    
    $busca_pedido = mysql_query("SELECT SUM(preco) as soma from itensvenda where id_produto='$pes[codigo]'"); 
    $qtde_pedido = mysql_query("SELECT SUM(qtde) as total from itensvenda where id_produto='$pes[codigo]'");
     
    
    while ($bp = mysql_fetch_array($busca_pedido)) {
   echo "<td bgcolor='#9CF' width='200' align='center'>
        R$ ".number_format($bp['soma'],2,",",".")."</td>";
   
   
     while ($qp = mysql_fetch_array($qtde_pedido)) {  
      
          echo "<td bgcolor='#9CF' width='100' align='center'>$qp[total]</td>";
         
     }    
       
 
   
    }
   
}

  }
 if(isset($_POST["compraclientes"])){
     
      
 echo '<tr>
     <td bgcolor="orange">
	<center><b>Id cliente</b></center></td>
     <td colspan="3" bgcolor="orange">
	<center><b>Nome do cliente</b></center></td>
        <td bgcolor="orange">
	<center><b>Total de compras</b></center></td></tr>';
    
$busca_cliente = mysql_query("SELECT * FROM clientes")or die(mysql_error());
      while ($bc = mysql_fetch_array($busca_cliente)) {
          
      
       $somacompra = mysql_query("SELECT COUNT(id_cliente) as total from pedidos where id_cliente='$bc[id]'"); 
      
      while ($sc = mysql_fetch_array($somacompra)) {
    echo " <tr><td bgcolor='#9FC' width='200' align='center'>$bc[id]</td> 
          <td colspan='3' bgcolor='#9FC' width='300' align='center'>$bc[nome]</td> 
          <td bgcolor='#9CF' width='200' align='center'>$sc[total]</td></tr>";

   
 
   
     }
     
       
  }
   
}  


if(isset($_POST["mensagensclientes"])){
    
    echo "<center><tr><td align='center' colspan='2'><a href='elogios.php'><img src='img/elogios.png' width='100' height='100'></a></td> ";
    echo "<center><td align='center' colspan='2'><a href='reclamacoes.php'><img src='img/reclamacoes.png' width='100' height='100'></a></td> ";
    echo "<center><td align='center' colspan='2'><a href='duvidas.php'><img src='img/dúvidas.png' width='100' height='100'></a></td></tr> ";
}
   

  
   
  


     
   
      


    
        
   




?>
