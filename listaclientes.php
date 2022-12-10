
<?php
//conectando com o localhost - mysql
include 'conexao-banco.php';
$buscar = $_POST['nome'];// o nome que o usuario digitou

$buscar_query = mysql_query("SELECT * FROM clientes WHERE nome LIKE '%$buscar%'")or die(mysql_error());//faz a busca com as palavras enviadas


  
// quando existir algo em '$busca_query' ele realizará o script abaixo.
while ($dados = mysql_fetch_array($buscar_query)) {
    echo "<table><tr><td width='250' bgcolor='#CFF'>
         ID: <br><font color='red'> $dados[id]</font></td>"; 
    echo "<td width='300' bgcolor='#CFF'>
          Nome: <br><font color='blue'>$dados[nome]</font></td>";
    echo "<td width='200' bgcolor='#CFF'>
            CPF: <br><font color='blue'>$dados[cpf]</font></td></tr>";
    echo "<tr><td bgcolor='#CF9'>
         Sexo: <br><font color='blue'> $dados[sexo]</font></td>";
     echo "<td width='200' bgcolor='#CF9'>
            Data Nascimento: <br><font color='blue'>$dados[dtnascimento]</font></td>";
      echo "<td width='200' bgcolor='#CF9'>
            CEP: <br><font color='blue'>$dados[cep]</font></td></tr>";
    echo "<tr><td bgcolor='#CFF'>
         Endereço: <br><font color='blue'> $dados[endereco]</font></td>";
    echo "<td bgcolor='#CFF'>N.: <br><font color='blue'> $dados[n_casa]</font></td>";
    echo "<td bgcolor='#CFF'>Bairro: <br><font color='blue'> $dados[bairro]</font></td></tr>";
    echo "<tr><td bgcolor='#CF9'>
            Telefone:<br><font color='blue'>  $dados[telefone]</font><br>";
    echo "<td bgcolor='#CF9'>Email:<br><font color='blue'>  $dados[email]</font></td>";
    echo "<td bgcolor='#CF9'>Senha:<br><font color='blue'>  $dados[senha]</font></td></tr>";
    echo "<tr><td colspan='2' align='center'><br><a href='alterarclientes.php?ID=$dados[id]'><img src='img/atualiza.png' width='40' height='40'> Alterar</a></td>";
    echo "<td><a href='excluircliente.php?ID=$dados[id]'><img src='img/excluir.png' width='40' height='40'> Excluir</a></td><tr>";
    echo "<hr>";
    
    
    
}
?>
  

    
