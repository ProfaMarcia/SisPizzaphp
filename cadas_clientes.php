<?php


//conectando com o localhost - mysql
include 'conexao-banco.php';



// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$nome	= $_POST ["nome"];	//atribuição do campo "nome" vindo do formulário de cadastro de clientes para variavel
$cpf = $_POST ["cpf"];          //atribuição do campo "cpf" vindo do formulário de cadastro de clientes para variavel
$sexo = $_POST["sexo"];
$dtnascimento = $_POST ["dtnascimento"];
$cep = $_POST["cep"];
$endereco= $_POST ["endereco"];	//atribuição do campo "endereco" vindo do formulário de cadastro de clientes para variavel
$ncasa= $_POST ["ncasa"];
$bairro= $_POST ["bairro"];
$email = $_POST ["email"];      //atribuição do campo "email" vindo do formulário de cadastro de clientes para variavel
$telefone = $_POST ["telefone"]; //atribuição do campo "telefone" vindo do formulário de cadastro de clientes para variavel
$senha = $_POST["senha"];

$sqlclin = "INSERT INTO clientes VALUES"."(NULL, '$nome', '$cpf', '$sexo', '$dtnascimento', '$cep','$endereco', '$ncasa','$bairro', '$email', '$telefone','$senha')";
 

mysql_query($sqlclin,$conect);
 

echo "<script>
alert('Seu cadastro foi realizado com sucesso!');
window.location='http://localhost/SisPizzaTccphp/cadastroclientes.php';
</script>";


?>
