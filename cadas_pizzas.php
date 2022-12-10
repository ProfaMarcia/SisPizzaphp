<?php

//conectando com o localhost - mysql
include 'conexao-banco.php';

// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$sabor	= $_POST ["sabor"];	//atribuição do campo "sabor" vindo do formulário para variavel
$tamanho = $_POST ["tamanho"];	//atribuição do campo "tamanho" vindo do formulário para variavel
$preco	= $_POST ["preco"];	//atribuição do campo "preco" vindo do formulário para variavel
$descricao = $_POST ["descricao"]; //atribuição do campo "descricao" vindo do formulário para variavel
$imagem = $_POST ["imagem"];


$sqlins = "INSERT INTO pizzas VALUES"."(NULL, '$sabor', '$tamanho', '$preco', '$descricao', '$imagem')";
 
mysql_query($sqlins,$conect);
 
echo "<script>
alert('Seu cadastro foi realizado com sucesso!');
window.location='http://localhost/SisPizzaTccphp/cadastropizzas.php';
</script>";

?>
