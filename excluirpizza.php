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
            
                <a href = "cadastropizzas.php"><img src="img/op_pizzas1.png" alt="op-pizza" width="100" height="100"></a>
                
                    <a href = "cadastrofuncionarios.php"><img src="img/op_funcionario.png" alt="op-clientes" width="100" height="100"></a>
               
                    <a href = "cadastroclientes.php"><img src="img/op_clientes.png" alt="op-clientes" width="100" height="100"></a>
                
                    <a href = "opcaopedidos.php"><img src="img/op_pedidos.png" alt="op-pizza" width="100" height="100"></a>
                
                    <a href = "opcaorelatorios.php"><img src="img/op_relatorios.png" alt="op-relatorios" width="100" height="100"></a>
                    
                    <a href = "carrinhopedidos.php"><img src="img/carrinho.png" alt="op-relatorios" width="100" height="100"></a>
                
                    <a href = "logout.php"><img src="img/sair.png" alt="op-relatorios" width="100" height="100"></a>
                
               
            </center>
     
    <center>
    <table width="800" border="0" bgcolor="#fff" >
    
        <td width="699" valign="top" bgcolor="#ffffff">
     <center> 
            <table width="625" border="0">
            <tr>
                <td colspan="2" border='0' align="center">
                    <a href = "cadastropizzas.php"><img src="img/cadastrar.png" width="70" height="70" id="cadastrar"  /></a><br>Cadastrar 
                </td>
                <td colspan="2" align="center">
                    <a href = "pesqpizza.php"><img src="img/buscar.png" width="70" height="70" id="pesquisar" /></a><br>Pesquisar 
                </td>
             </tr>
            <br>
 
        </table>
        </center>
      <table width="668" border="0" cellpadding="0" cellspacing="0">
    
          <form id="pesquisa" name="pesquisa" method="post" action=""  onsubmit="return validaCampo(); return false;">
	   <tr>
               
              
        <center><H2>EXCLUSÃO DE PIZZAS</h2>
            <br>Cuidado! Se clicar no botão "EXCLUIR", você apagará todos os dados do cadastro da pizza.
        
      <?php
      
      include 'conexao-banco.php';
      
     
      

    echo '<td align="center"><h3>Código Pizza:</h3></td>
        </tr>
        <tr>
      <td align="center"><input readonly="readonly" name="codigo" value="'.$_GET['cod'].'" type="text" id="codigo" size="1" />
            <tr>
             <br> 
      <td align="center"><p>
        <input name="excluir" type="submit" id="excluir" value="Excluir" /> </form></center> ';
            
        



 if(isset($_GET['cod'])){
           $codigo = $_GET['cod']; // o codigo da pizza
        }
     
  if(isset($_POST['codigo'])){
  
      
       // SQL para apagar registro
 $deleta = "DELETE from pizzas WHERE codigo='$codigo'";
    mysql_query($deleta) or die(mysql_error());
     
    echo "<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
        alert('Cadastro da pizza excluído com sucesso!');
        window.location='http://localhost/SisPizzaTccphp/listapizzas1.php';
        </SCRIPT>";
  }

   ?>      
         
   </center>
          
</body>
</html>