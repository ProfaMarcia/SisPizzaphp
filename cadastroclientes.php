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
if(document.cadastro.nome.value=="" || document.cadastro.nome.value.length < 10 )
	{
	alert("O Campo nome é obrigatório e deve conter mais que 10 caracteres !");
	return false;
	}
else
	if(document.cadastro.cpf.value=="")
	{
	alert("O Campo cpf é obrigatório!");
	return false;
	}
else
	if(document.cadastro.sexo.value=="Selecione")
	{
	alert("O Campo sexo é obrigatório!");
	return false;
	}
 else
	if(document.cadastro.dtnascimento.value=="" || document.cadastro.dtnascimento.value.length < 10  )  {     
         //validar data de nascimento
         
           var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
        var msgErro = 'Formato inválido de data.';
        if ((dtnascimento.value.match(expReg)) && (dtnascimento.value!='')) {
                alert('Data válida'); 
        } else {
                alert(msgErro);
                dtnascimento.focus();
        
        
         }
}
else
	if(document.cadastro.cep.value=="" || document.cadastro.cep.value.length < 8 )
	{
	exp = /\d{2}\.\d{3}\-\d{3}/
        if(!exp.test(cep.value))
                alert('Numero de Cep Inválido!'); 
	return false;
	}
else
	if(document.cadastro.endereco.value=="")
	{
	alert("O Campo endereço é obrigatório!");
	return false;
	}

else
	if(document.cadastro.ncasa.value=="")
	{
	alert("O Campo Nº. é obrigatório!");
	return false;
	}
else
	if(document.cadastro.bairro.value=="")
	{
	alert("O Campo bairro é obrigatório!");
	return false;
	}
else
    	if(document.cadastro.email.value=="" || document.cadastro.email.value.indexOf('@')==-1 || document.cadastro.email.value.indexOf('.')==-1){

                   alert("O campo " + document.cadastro.email.name + " deve ser preenchido!");

                  document.cadastro.email.focus();

                   return false;

        }

       //validar email(verificao de endereco eletrônico)

         parte1 = document.cadastro.email.value.indexOf("@");

         parte2 = document.cadastro.email.value.indexOf(".");

         parte3 = document.cadastro.email.value.length;

         if (!(parte1 >= 3 && parte2 >= 6 && parte3 >= 9)) {

                  alert ("O campo " + document.cadastro.email.name + " deve ser conter um endereco eletronico!");

                  document.cadastro.email.focus();

                  return false;

	}
else
   	if(document.cadastro.telefone.value=="" || document.cadastro.telefone.value.length < 10)
	{
	exp = /\(\d{2}\)\ \d{4}\-\d{4}/
        if(!exp.test(telefone.value))
                alert('Numero de Telefone Inválido!');
	return false;
	}
else
   	if (document.cadastro.senha.value=="" || document.cadastro.senha.value.length < 6){
	alert("Sua senha tem que ter no mínimo 6 caracteres e no máximo 20.");
        
	return false;
	}

return true;
}
<!-- Fim do JavaScript que validarÃ¡ os campos obrigatorios! -->
</script>
</head>
 
<body background="img/pizzafundo2.jpg">
       
        <?php
error_reporting (0);
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
            
        <center><h2>CADASTRO DE CLIENTES</h2></center>
            
 <form id="validar" name="validar" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" >
  <table width="800" border="0">
    
    
        <?php
        
        //Conexão com o Banco
              include 'conexao-banco.php';  
  //VALIDAÇÃO DO CPF   
      
//VERIFICA SE O FORMULÁRIO FOI ENVIADO
if(isset($_POST["verOK"])) {
 //RECEBE OS DADOS DO FORMULÁRIO
 $cpf = $_POST["cpf"];
 
 //VERIFICA SE O QUE FOI INFORMADO É NÚMERO
 if(!is_numeric($cpf)) {
  $status = false;
 }
 
 else {
  //VERIFICA
  if( ($cpf == '11111111111') || ($cpf == '22222222222') ||
   ($cpf == '33333333333') || ($cpf == '44444444444') ||
   ($cpf == '55555555555') || ($cpf == '66666666666') ||
   ($cpf == '77777777777') || ($cpf == '88888888888') ||
   ($cpf == '99999999999') || ($cpf == '00000000000') ) {
   $status = false;
  }
 
  else {
   //PEGA O DIGITO VERIFIACADOR
   $dv_informado = substr($cpf, 9,2);
 
   for($i=0; $i<=8; $i++) {
    $digito[$i] = substr($cpf, $i,1);
   }
 
   //CALCULA O VALOR DO 10º DIGITO DE VERIFICAÇÂO
   $posicao = 10;
   $soma = 0;
 
   for($i=0; $i<=8; $i++) {
    $soma = $soma + $digito[$i] * $posicao;
    $posicao = $posicao - 1;
   }
 
   $digito[9] = $soma % 11;
 
   if($digito[9] < 2) {
    $digito[9] = 0;
   }
   else {
    $digito[9] = 11 - $digito[9];
   }
 
   //CALCULA O VALOR DO 11º DIGITO DE VERIFICAÇÃO
   $posicao = 11;
   $soma = 0;
 
   for ($i=0; $i<=9; $i++) {
    $soma = $soma + $digito[$i] * $posicao;
    $posicao = $posicao - 1;
   }
 
   $digito[10] = $soma % 11;
 
   if ($digito[10] < 2) {
    $digito[10] = 0;
   }
   else {
    $digito[10] = 11 - $digito[10];
   }
 
  //VERIFICA SE O DV CALCULADO É IGUAL AO INFORMADO
  $dv = $digito[9] * 10 + $digito[10];
  if ($dv != $dv_informado) {
   $status = false;
  }
  else
   $status = true;
  }//FECHA ELSE
}//FECHA ELSE(is_numeric)
}//FECHA IF($_POST)

 echo '<tr>
 <td>CPF:</td> 
<td><input type="text" value="'.$cpf.'" name="cpf" maxlength="11">
<input type="submit" value="Validar CPF" name="verOK"></td>
</form>';

 //VERIFICA O RESULTADO
if(isset($_POST["verOK"])) {
    
   $cpf = trim($_POST['cpf']);
    
$busca_cpf = mysql_query("SELECT * FROM clientes WHERE cpf='$cpf'")or die(mysql_error());//faz a busca com as palavras enviadas
$numRegistros = mysql_num_rows($busca_cpf);

if ($numRegistros !=1) { //Se nao achar nada, lança essa mensagem
 
echo "<br><font face='Arial' size='2' color='#FF0000'><b>Resultado:</b></font><br><br>";
 if($status)
  echo '
      <font color="blue">CPF VÁLIDO!</font>
     
     
<form id="cadastro" name="cadastro" method="post" action="cadas_clientes.php" onsubmit="return validaCampo(); return false;" >
  <table width="800" border="0">
    
    <tr>
      <td>Nome Completo:</td>
      <td><input name="nome" type="text" id="nome" size="40" maxlength="40" />
      <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>CPF:</td>
      <td><input name="cpf" type="text" readonly="readonly" value="'.$cpf.'" id="cpf" size="30" maxlength="40" />
      <span class="style1">*</span></td>
    </tr>
    <td>Sexo:</td>
     <td>
       <select name="sexo" id="sexo">
           <option>Selecione</option>
           <option value="Feminino">Feminino</option>
           <option value="Masculino">Masculino</option>
           </select>
    </tr>
    <td>Data Nascimento:</td>
      <td><input name="dtnascimento" type="text" id="dtnascimento" size="30" maxlength="40" />(DD/MM/AAAA)
      <span class="style1">*</span></td>
    </tr>
    <td>CEP:</td>
      <td><input name="cep" type="text" size="15" maxlength="10" /> (Cadastro apenas para Cidade de Manaus)
      <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Endereço:</td>
      <td><input name="endereco" type="text" id="endereco" size="30" maxlength="40" />
      <span class="style1">*</span></td>
    </tr>
        <tr>
      <td>NºCasa/Apto</td>
      <td><input name="ncasa" type="text" id="ncasa" size="30" maxlength="40" />
      <span class="style1">*</span></td>
    </tr>
        <tr>
      <td>Bairro:</td>
      <td><input name="bairro" type="text" id="bairro" size="30" maxlength="40" />
      <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>E-mail:</td>
      <td><input name="email" type="text" id="email" size="30" maxlength="80" />(xxx@xx.xx)
        <span class="style1">*</span></td>
     </tr>
     <tr>
      <td>Telefone:</td>
      <td><input name="telefone" type="text" id="telefone" size="30" maxlength="40" />(Código de área obrigatório)
       <span class="style1">*</span></td>
    </tr>
    <tr>
      <td>Senha:</td>
      <td><input name="senha" type="password" id="senha" size="30" maxlength="20" /> (Mínimo: 6 caracteres)
      <span class="style1">*</span></td>
    </tr>
        
     <tr>
      <td colspan="5"><p>
        <input name="cadastrar" type="submit" id="cadastrar" value="Concluir Cadastro!" /> 
        
          <input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos!" />
          <br>
          <span class="style1">* Campos com * são obrigatórios!          </span></p>
        <p>&nbsp; </p>
      </td>
    </tr>
    ';
 
 else
  echo "<b>O CPF $cpf é INVÁLIDO</b>";
}//FECHA IF

while ($pes = mysql_fetch_array($busca_cpf)) {
    
    echo "<font color='red'>Já está sendo usado.</font>";
    
}
}
 ?>
 
      <br>
 
    </table>
   
      
</form>
     </table>
        
    
</body>
</html>



