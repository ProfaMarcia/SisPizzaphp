<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>.::PAINEL DE CONTROLE DO SISPIZZA::.</title>
</head>
<?php
//conectando com o localhost - mysql
include 'conexao-banco.php';



// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$nome	= $_POST ["nome"];	//atribuição do campo "nome" vindo do formulário de cadastro de clientes para variavel
$cpf = $_POST ["cpf"];          //atribuição do campo "cpf" vindo do formulário de cadastro de clientes para variavel
$cargo= $_POST ["cargo"];	//atribuição do campo "endereco" vindo do formulário de cadastro de clientes para variavel
$senhaadm= $_POST ["senhaadm"];
$loginger= $_POST ["loginger"];
$senhager = $_POST ["senhager"];      //atribuição do campo "email" vindo do formulário de cadastro de clientes para variavel


$aut_gerente = mysql_query("SELECT * FROM administradores where cpf='$loginger' and senha='$senhager' and cargo='gerente'")or die(mysql_error());
           
while ($cad_adm = mysql_fetch_assoc($aut_gerente)) {

$cad_adm = "INSERT INTO administradores VALUES"."(NULL, '$nome', '$cpf', '$cargo', '$senhaadm')";
 

mysql_query($cad_adm,$conect);
 

echo "<script>
alert('Seu cadastro foi realizado com sucesso!');
window.location='http://localhost/SisPizzaTccphp/cadastrofuncionarios.php';
</script>";
            }
      echo "Erro! Voce não tem previlégios para efetuar o cadastro.<br> <a href='inicial.php'>Inicio</a> ";      
?>
</html>