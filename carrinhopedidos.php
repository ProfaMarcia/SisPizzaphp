<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>.::PAINEL DE CONTROLE DO SISPIZZA::.</title>


 <script type="text/javascript">
function validaCampo()
{
if(document.carrinho.id.value=="")
{
	alert("O Campo ID do Cliente é obrigatório!");
	return false;
	}
else
if(document.carrinho.total.value==""||document.carrinho.total.value =="0,00"){
	alert("É obrigatório o Campo Total ser superior a zero!");
	return false;
	}
else
return true;
}
</script>
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
     <center> 
            <table width="800"  border="0">
            <tr>
                   <td colspan="2" align="center">
                    <a href = "pesquisarclientes.php"><img src="img/buscar.png" width="70" height="70" id="pesquisar" /></a><br>Pesquisar Cliente
                </td>
             </tr>
            <br>
 
        </table>
       
            <h1>Carrinho de pedidos</h1> </center>
            
           
<center>
         
    <?php
    
    include('conexao-banco.php');
     
    if(isset($_POST["pesquisar"])){
     
     $idcliente = $_POST['id'];
     
      $busca_cliente = mysql_query("SELECT * FROM clientes WHERE id='$idcliente'")or die(mysql_error());//faz a busca com as palavras enviadas
            
                        // Exibirá os dados do cliente
            while ($dados = mysql_fetch_assoc($busca_cliente)) {
               
        }
    }
    
    ?>
       <table width="300" height="100" border="0"> 
     <tr>
     <td colspan="6" bgcolor="#32CD32" ><div align="center"><b>Carrinho</b></font></div></td>
     </tr>
      
           
       <tr>
     
        <td bgcolor="orange" >
        <center><b>Foto</b></center></td>
        <td bgcolor="orange" >
        <center><b>Sabor</b></center></td>
        <td bgcolor="orange">
	<center><b>Tamanho</b></center></td>
        <td bgcolor="orange">
	<center><b>Preço</b></h5></center></td>
	<td bgcolor="orange">
	<center><b>Qtde</b></center></td>
        <td bgcolor="orange">
        <center><b>Delete</b></center></td>
    </tr> 
         
            <?php
            
             include_once('conexao-banco.php');
             
             // Iniciando a contagem de da sessão do carrinho por zero.
             if(count($_SESSION['carrinho']) == 0){
                 echo "<tr><h3><font color='blue'> Carrinho vazio!</font></h3></tr>";
             }else{
                 
                            
            
     // A sessão vai ser igual a variavel Prod(onde fica o codigo da pizza) que recebe "=>" o parametro qtde
                 
      //Quando o usuário clicar em compar o carrinho vai receber GET e armazenar no $Prod que vai receber a $qtde 
                // que o usuário clicou em comprar
        foreach($_SESSION['carrinho'] as $Prod => $qtde ):
            
            // Pesquisando a pizza pelo codigo que é igual o $Prod
           $Sqlcarrinho = mysql_query("SELECT * FROM pizzas WHERE codigo='$Prod'");
           $ResAssoc = mysql_fetch_assoc($Sqlcarrinho);
           echo "<tr>"; 
           echo "<td><center><img src='img/$ResAssoc[imagem]' width='100' height='85'></td>";
            
           echo "<td><center>$ResAssoc[sabor]</center></td>";
           
           echo "<td><center>$ResAssoc[tamanho]</center></td>";
            
           echo "<td><center>".number_format ($ResAssoc['preco']*$qtde,2,",",".")."</center></td>";
           
           echo "<td><center>$qtde</center></td>";
           
           echo "<td><center><a href='carrinhopedidos.php?del=$ResAssoc[codigo]'><img src='img/del.jpg'></a></center></td>";
         
           //Total sendo calculado pela preço vezes a qtde.
           $total += $ResAssoc['preco'] * $qtde;
           
        endforeach;
             }
        
        echo "<tr>"; 
        
         echo "<form id='calculartroco' name='calculartroco' method='post' action='".$_SERVER["PHP_SELF"]."'>";
                echo "<tr><td colspan='6' align='center'><input align='right' type='submit' name='calcular' value='Clique aqui para calcular o troco do cliente'/></td></tr>";
           
                
           
           if(isset($_POST["calcular"])) {
           $valor_recebido = $_POST["valor_recebido"];
           //Se clicou em calcular, entao calcula valor recebido - total, para totalizar o troco.
           $troco = $valor_recebido - $total;
        
           
           echo "<tr><td bgcolor='pink' colspan='6' border='0'>
                Recebido:<b> R$ <input size='8' style='font-size: 18px;' value='$valor_recebido' name='valor_recebido' />"; 
                
                echo "<input align='right' type='submit' name='calcular' value='Calcular'/></td></tr>";
           
           }
           
           echo "</form>
               <form id='carrinho' name='carrinho' method='post' action='finalizacarrinho.php' onsubmit='return validaCampo(); return false;'>
               <td bgcolor='pink' colspan='6' border='0' align='right'>Total do carrinho:<b> R$ 
            <input style='font-size: 18px;' size='8' readonly='readonly' name='total' value='".number_format ($total,2,",",".")."' id='total'/> </b></td></tr>";
           
            echo "<tr><td bgcolor='pink' align='right' colspan='6'>Troco:<b> R$ 
                <input size='8' readonly='readonly' style='font-size: 18px;' name='troco' value='".number_format ($troco,2,",",".")."' id='total'/> </b></td>";
            
            $id = $_POST["id"];
           echo "<tr><td bgcolor='pink' colspan='6' border='0' align='right'>Insira o ID do cliente:<b>
               <input name='id' style='font-size: 18px;' value='$id' type='text' id='id' size='8' /></td></tr>";
         
          echo "<tr><td colspan='2' align='center'><a href='carrinhopedidos.php'>Atualizar carrinho</a></td>";
          echo "<td colspan='4' align='center'><a href='pesqpizza.php'>Continuar comprando</a></td></tr>";
                    
           echo "<tr><td colspan='2' align='right'>
               <input align='right' style='background-color: green; color: #ffffff; font-size: 12pt; text-align: center;' type='submit' name='finalizar' value='Finalizar Pedido'/></td>
               </form>";
      
      
      echo "<form id='canc_carrinho' name='canc_carrinho' method='post' action='' >
          <td colspan='4' align='center'>
               <input align='center' style='background-color: red; color: #ffffff; font-size: 12pt; text-align: center;' type='submit'  name='cancelar' value='Cancelar Pedido'/></td>
            </form>";
      echo "</tr>";
 
   
      //Cancela pedido
if(isset($_POST['cancelar'])){
    
   echo "<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
        alert('Pedido cancelado com sucesso!');
        window.location='http://localhost/SisPizzaTccphp/carrinhopedidos.php';
        </SCRIPT>";
    
    unset($_SESSION['carrinho']);
}
      
      ?>  
</table></center>
</body>
</html>
