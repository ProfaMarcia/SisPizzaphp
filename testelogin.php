<?php 


error_reporting(0);
/// session_start inicia a sessão 
 
// as variáveis login e senha recebem os dados digitados na página anterior 
session_start();
$login = $_POST["login"];
$senha = $_POST["senha"];

//Abre a conexão com o mysql
//conectando com o localhost - mysql
include 'conexao-banco.php';

//Seleciona os dados na tabela
$Selecaousuario = "select * from administradores where cpf='$login' and senha='$senha'";
$Executselecao = mysql_query($Selecaousuario) or die("Erro ao selecionar dados. Favor informar ao Administrador enviando a mensagem abaixo.<br> <a href='login.php'>Login</a> " . mysql_error());
$Recebselecao = mysql_fetch_array($Executselecao) or die("Erro ao Logar. Favor voltar e tentar novamente. <br>Caso o erro persistir, informar ao Gerente ou
    <br> efetue o <a href='login.php'>Login</a> novamente. " . mysql_error());
$linhaselecionada = mysql_num_rows($Executselecao);

$idcli 	= $Recebselecao[id];
$nome  	= $Recebselecao[nome];

if($linhaselecionada == 1)
{
$_SESSION['id_adm']=$idcli;   
$_SESSION['nome_adm']=$nome;

include ("inicial.php");
}
else
{
session_destroy();
echo "Login Incorreto<br>";
}
    
?>