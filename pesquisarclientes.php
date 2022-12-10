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
               
                    <a href = "cadastroclientes.php"><img src="img/op_clientes1.png" alt="op-clientes" width="100" height="100"></a>
                
                    <a href = "opcaopedidos.php"><img src="img/op_pedidos.png" alt="op-pizza" width="100" height="100"></a>
                
                    <a href = "opcaorelatorios.php"><img src="img/op_relatorios.png" alt="op-relatorios" width="100" height="100"></a>
                    
                    <a href = "carrinhopedidos.php"><img src="img/carrinho.png" alt="op-relatorios" width="100" height="100"></a>
                
                    <a href = "logout.php"><img src="img/sair.png" alt="op-relatorios" width="100" height="100"></a>
                
            
            </center>
     
    <center>
    <table width="800" border="0" bgcolor="#fff" >
    
        <td width="800" valign="top" bgcolor="#ffffff">
     <center> 
            <table width="800" border="0">
            <tr>
                <td colspan="2" border='0' align="center">
                    <a href = "cadastroclientes.php"><img src="img/cadastrar.png" width="70" height="70" id="cadastrar"  /></a><br>Cadastrar 
                </td>
                <td colspan="2" align="center">
                    <a href = "pesquisarclientes.php"><img src="img/buscar.png" width="70" height="70" id="pesquisar" /></a><br>Pesquisar 
                </td>
             </tr>
            <br>
 
        </table>
        </center>
        
    
     <table width="800" border="0" cellpadding="0" cellspacing="0">
          <tr>
     
        <form id="pesquisa" name="pesquisa" method="post" action=""  onsubmit="return validaCampo(); return false;">
            <table width="800" border="0">   
                <tr>
                    <center><h2>PESQUISA DE CLIENTES</h2></center>
                    <td align="center"><h3>Nome do cliente:</h3></td>
                    </tr>
                    <tr>
                    <td align="center"><input name="nome" type="text" id="nome" size="40" />
                    </tr>
                    <tr>
                    <td align="center">
                    <p><input name="pesquisar" type="submit" id="pesquisar" value="Pesquisar" /> 
        
                    </td>
                        </tr>
                <?php
                if (isset($_POST["pesquisar"])){
                    
                    include 'listaclientes.php';
                }
                
                
                ?>
                  
            </table>
        </form>
        </table>
     
        </body>
</html>
               
 
        