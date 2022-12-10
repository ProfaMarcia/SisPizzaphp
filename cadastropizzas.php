
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
if(document.cadastro.sabor.value=="")
	{
	alert("O Campo sabor é obrigatório!");
	return false;
	}
else
	if(document.cadastro.tamanho.value=="")
	{
	alert("O Campo tamanho é obrigatório!");
	return false;
	}
else
	if(document.cadastro.preco.value=="")
	{
	alert("O Campo preço é obrigatório!");
	return false;
	}
else
	if(document.cadastro.descricao.value=="")
	{
	alert("O Campo descrição é obrigatório!");
	return false;
	}
else
	if(document.cadastro.imagem.value=="")
	{
	alert("O Campo imagem é obrigatório!");
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
    
        <td width="800" valign="top" bgcolor="#ffffff">
     <center> 
            <table width="800" border="0">
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
        <form id="cadastro" name="cadastro" method="post" action="cadas_pizzas.php" onsubmit="return validaCampo(); return false;" >
         <table width="800" border="0">
                      
            <center><h2>CADASTRO DE PIZZAS</h2></center>
            <tr>
                <td>Sabor:</td>
                <td><input name="sabor" type="text" id="sabor" size="40" maxlength="40" />
                <span class="style1">*</span></td>
            </tr>
            <tr>
                <td>Tamanho:</td>
                <td>
                    <select name="tamanho" id="tamanho">
                        <option>Selecione...</option>
                        <option value="FM">Família</option>
                        <option value="GD">Grande</option>
                        <option value="MD">Média</option>
                        <option value="PQ">Pequena</option>
                    </select>
                <span class="style1">*</span></td>
            </tr>
            <tr>
                <td>Preço:</td>
                <td><input name="preco" type="text" id="preco" maxlength="40" />
                <span class="style1">*</span></td>
            </tr>
            <tr>
                <td>Descrição:</td>
                <td><input name="descricao" type="text" id="descricao" maxlength="80" />
                <span class="style1">*</span></td>
            </tr>
            <tr>
                <td>Imagem:</td>
                <td><input type="file" id="imagem" name="imagem" />
                <span class="style1">*</span></td>
            </tr>
            <tr>

                <td colspan="2" border='0' align="center">
                   <input name="cadastrar" type="submit" id="cadastrar" value="Concluir Cadastro" />  
            
                     <input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos" />
                </td>
            </tr>
            <tr>
                <td colspan="2" border='0' align="center">
                <span class="style1">* Campos com * são obrigatórios!</span>
                </td>
            </tr>
    
     
           
     </table>       
     </form>
     </table>
     </center>   
    
</body>
</html>



