<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>.::PAINEL DE CONTROLE DO SISPIZZA::.</title>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-size: x-small;
}
.style3 {color: #0000FF; font-size: x-small; }
-->
</style>
<script type="text/javascript">
function validaCampo()
{
if(document.pesquisa.loginger.value=="")
	{
	alert("O Campo Login é obrigatório!");
	return false;
	}
else
   	if(document.pesquisa.senhager.value=="")
	{
	alert("O Campo Senha é obrigatório!");
	return false;
	}
else
return true;
}
<!-- Fim do JavaScript que validarÃ¡ os campos obrigatorios! -->
</script>
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
                
                    <a href = "cadastrofuncionarios.php"><img src="img/op_funcionario1.png" alt="op-clientes" width="100" height="100"></a>
               
                    <a href = "cadastroclientes.php"><img src="img/op_clientes.png" alt="op-clientes" width="100" height="100"></a>
                
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
                    <a href = "cadastrofuncionarios.php"><img src="img/cadastrar.png" width="70" height="70" id="cadastrar"  /></a><br>Cadastrar 
                </td>
                <td colspan="2" align="center">
                    <a href = "pesquisarfuncionarios.php"><img src="img/buscar.png" width="70" height="70" id="pesquisar" /></a><br>Pesquisar 
                </td>
             </tr>
            <br>
 
        </table>
        </center>
        
    
     <table width="400" border="0" cellpadding="0" cellspacing="0">
          <tr>
     
          
               <tr>
                    <center><h2>PESQUISA DE ADMINISTRADORES</h2></center>
                  
                    
              
                       
<form id="pesquisa" name="pesquisa" method="post" action=""  onsubmit="return validaCampo(); return false;">
            <center><table width="800" border="0"> 
      <tr>
      <td align="center">Login:</td>
      <td><input name="loginger" type="text" id="loginger" size="30" maxlength="40" />
      <span class="style1">*</span></td>
    </tr>
      
     <tr>
      <td align="center">Senha:</td>
      <td><input name="senhager" type="password" id="senhager" size="30" maxlength="20" />
       <span class="style1">*</span></td>
    </tr>
   <tr> 
       <td colspan="2" align="center">
     <input name="entrar" type="submit" id="pesquisar" value="Entrar" /> 
      </td>
      </tr> 
       <tr><td colspan="2" align="center">
          <span class="style1">* Campos com * são obrigatórios!          </span> </td>
      </tr> 
<?php

if(isset($_POST["entrar"])){

include 'conexao-banco.php';


$loginger= $_POST ["loginger"];
$senhager = $_POST ["senhager"];      //atribuição do campo "email" vindo do formulário de cadastro de clientes para variavel


$aut_gerente = mysql_query("SELECT * FROM administradores where cpf='$loginger' and senha='$senhager' and cargo='gerente'")or die(mysql_error());
           
while ($cad_adm = mysql_fetch_assoc($aut_gerente)) {
    
    


                
$buscar_query = mysql_query("SELECT * FROM administradores")or die(mysql_error());//faz a busca com as palavras enviadas


  
// quando existir algo em '$busca_query' ele realizará o script abaixo.
while ($dados = mysql_fetch_array($buscar_query)) {
    echo "<table><tr><td width='250'>
         ID: <br><font color='red'> $dados[id]</font></td>"; 
    echo "<td width='300'>
          Nome: <br><font color='blue'>$dados[nome]</font></td>";
    echo "<td width='200'>
            CPF: <br><font color='blue'>$dados[cpf]</font></td></tr>";
    echo "<tr><td>
         Cargo: <br><font color='blue'> $dados[cargo]</font></td>";
    echo "<td>Senha : <br><font color='blue'> $dados[senha]</font></td>";
    echo "<tr><td colspan='2' align='center'><br><a href='alteraradm.php?ID=$dados[id]'><img src='img/atualiza.png' width='40' height='40'> Alterar</a></td>";
    echo "<td><a href='excluiradm.php?ID=$dados[id]'><img src='img/excluir.png' width='40' height='40'> Excluir</a></td><tr>";
    echo "<hr>";
    
 }   
 
}

}
?>

               
            </table></center>  </form>    
            </table>
        
        </table>
     
        </body>
</html>
               
 
        