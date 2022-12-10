<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>.::PAINEL DE CONTROLE DO SISPIZZA::.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head> 
    <body>
            
<?php
error_reporting(0);

session_start();


//conectando com o localhost - mysql
include 'conexao-banco.php';
$busca = $_POST['sabor'];// o sabor que o usuario digitou

$busca_query = mysql_query("SELECT * FROM pizzas WHERE sabor LIKE '%$busca%'")or die(mysql_error());//faz a busca com as palavras enviadas

if (empty($busca_query)) { //Se nao achar nada, lança essa mensagem
    echo "Nenhum registro encontrado.";

}   

// quando existir algo em '$busca_query' ele realizará o script abaixo.
while ($pes = mysql_fetch_array($busca_query)) {
    echo "Código: <font color='red'> $pes[codigo]</font><br>"; 
    echo "Sabor: <font color='blue'>$pes[sabor]</font><br>";
    echo "Tamanho: <font color='blue'>$pes[tamanho]</font><br>";
    echo "Preço: <font color='green'>".number_format($pes['preco'],2,",",".")." Reais</font><br>";
    echo "Descrição:<font color='blue'>  $pes[descricao]</font><br>";
    echo "<img src='img/$pes[imagem]' width='250' height='180'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<a href='alt_pizza.php?cod=$pes[codigo]'><img src='img/atualiza.png' width='50' height='50'> Alterar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<a href='excluirpizza.php?cod=$pes[codigo]'><img src='img/excluir.png' width='50' height='50'> Excluir</a> <br>";
    echo "<a href='carrinhopedidos.php?acao=add&cod=$pes[codigo]'><img src='img/comprar.png' width='100' height='60'></a> <br>";
    echo "<hr>";
    
    
    
}
?>
    </body>
</html>
         

    
