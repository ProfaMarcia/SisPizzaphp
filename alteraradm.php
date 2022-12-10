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
if(document.cadastro.nome.value=="")
	{
	alert("O Campo nome é obrigatório!");
	return false;
	}
else
	if(document.cadastro.cpf.value=="")
    	{
            
    	alert("O Campo cpf está inválido!");
	return false;
	}
else
	if(document.cadastro.cargo.value=="")
	{
	alert("O Campo cargo é obrigatório!");
	return false;
	}
else
	if (document.cadastro.senha.value=="" || document.cadastro.senha.value.length < 6){
	alert("Sua senha tem que ter no mínimo 6 caracteres e no máximo 20.");
         return false;
	}
 else
    
return true;

}


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
    
        <td width="699" valign="top" bgcolor="#ffffff">
     <center> 
            <table width="625" border="0">
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
         <form id="alterar" name="alterar" method="post" action="" onsubmit="return validaCampo(); return false;">
  <table width="625" border="0">
    
        <center><h2>ALTERAÇÃO DO CADASTRO DO ADMINISTRADOR</h2></center>
          <tr>
              
          <?php
          
          error_reporting(0);
          
          
          //conectando com o localhost - mysql
        include 'conexao-banco.php';
        
       // Se o cliente clicar em atualizar ele pega o paramnetro do codigo.
        if(isset($_GET['ID'])){
           $id = $_GET['ID']; // o id do cliente
        }
                    

         $pesqadm = mysql_query("SELECT * FROM administradores WHERE id='$id'")or die(mysql_error());
      
// quando existir algo em '$busca_query' ele realizará o script abaixo.
while ($pa = mysql_fetch_array($pesqadm)) {
           
 echo '<tr>
        <td>ID:</td>
      <td><input name="id" readonly="readonly" value="'.$pa[id].'" type="text" id="id" size="40" /></td>
       </tr>
       
        <tr>
        <td>Nome:</td>
      <td><input name="nome" value="'.$pa[nome].'" type="text" id="nome" size="40" />
    </tr>
    <tr>
        <td>CPF:</td>
      <td><input name="cpf"  readonly="readonly" value="'.$pa[cpf].'" type="text" id="cpf" size="40"  />
    </tr>
       <tr>
        <td>Cargo:</td>
      <td><input name="cargo" value="'.$pa[cargo].'" type="text" id="cargo" size="40"  />
    </tr>
    <tr>
      <td>Senha :</td>
      <td><input name="senha" value="'.$pa[senha].'" type="password" id="senha" size="40" />
        </td>
    </tr>'  ;
            
            echo '</tr>
    <tr>
      <td colspan="2"><p>
        <input name="alterar" type="submit" id="alterar" value="Concluir Alteracao" /> 
         <input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos" />
          <br>
          </p>';
          
}
        
	
        
        if (isset($_POST["alterar"])){
        
	     $id = $_POST['id'];
             $nome = $_POST['nome'];
             $cpf = $_POST['cpf'];
             $cargo = $_POST['cargo'];
             $senha = $_POST['senha'];
            

    $altclientes = "UPDATE administradores SET id='$id', nome='$nome', cpf='$cpf', cargo='$cargo', senha='$senha' WHERE id='$id'";
    mysql_query($altclientes) or die(mysql_error());

        echo "<script>
        alert('Atualização realizada com sucesso!');
        window.location='http://localhost/SisPizzaTccphp/pesquisarfuncionarios.php';
        </script>";
       
        }
	?>
     
  </table>
              </table>
         
       </head>    
</html>