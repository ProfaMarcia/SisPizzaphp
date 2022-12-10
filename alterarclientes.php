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
                
                    <a href = "cadastrofuncionarios.php"><img src="img/op_funcionario.png" alt="op-clientes" width="100" height="100"></a>
               
                    <a href = "cadastroclientes.php"><img src="img/op_clientes1.png" alt="op-clientes" width="100" height="100"></a>
                
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
                    <a href = "cadastroclientes.php"><img src="img/cadastrar.png" width="70" height="70" id="cadastrar"  /></a><br>Cadastrar 
                </td>
                <td colspan="2" align="center">
                    <a href = "pesquisarclientes.php"><img src="img/buscar.png" width="70" height="70" id="pesquisar" /></a><br>Pesquisar 
                </td>
             </tr>
            <br>
 
        </table>
        </center>
         <form id="alterar" name="alterar" method="post" action="" onsubmit="return validaCampo(); return false;">
  <table width="625" border="0">
    
        <center><h2>ALTERAÇÃO DO CADASTRO DO CLIENTE</h2></center>
          <tr>
              
          <?php
          
          error_reporting(0);
          
          
          //conectando com o localhost - mysql
        include 'conexao-banco.php';
        
       // Se o cliente clicar em atualizar ele pega o paramnetro do codigo.
        if(isset($_GET['ID'])){
           $id = $_GET['ID']; // o código do cliente
        }
                    

         $pescliente = mysql_query("SELECT * FROM clientes WHERE id='$id'")or die(mysql_error());
      
// quando existir algo em '$busca_query' ele realizará o script abaixo.
while ($pc = mysql_fetch_array($pescliente)) {
           
 echo '<tr>
        <td>ID:</td>
      <td><input name="id" readonly="readonly" value="'.$pc[id].'" type="text" id="id" size="40" /></td>
       </tr>
       
        <tr>
        <td>Nome:</td>
      <td><input name="nome" value="'.$pc[nome].'" type="text" id="nome" size="40" />
    </tr>
    <tr>
        <td>CPF:</td>
      <td><input name="cpf" value="'.$pc[cpf].'" type="text" id="cpf" size="40"  />
    </tr>
    <tr>
        <td>Sexo:</td>
      <td><input name="sexo" value="'.$pc[sexo].'" type="text" id="sexo" size="40"  />
    </tr>
    <tr>
        <td>Data Nascimento:</td>
      <td><input name="dtnascimento" value="'.$pc[dtnascimento].'" type="text" id="dtnascimento" size="40"  />
    </tr>
    <tr>
        <td>CEP:</td>
      <td><input name="cep" value="'.$pc[cep].'" type="text" id="cep" size="40"  />
    </tr>
       <tr>
        <td>Endereço:</td>
      <td><input name="endereco" value="'.$pc[endereco].'" type="text" id="endereco" size="40"  />
    </tr>
    <tr>
      <td>N.:</td>
      <td><input name="ncasa" value="'.$pc[n_casa].'" type="text" id="ncasa" size="40" />
        </td>
    </tr>
    <tr>
      <td>Bairro:</td>
      <td><input name="bairro" value="'.$pc[bairro].'" type="text" id="bairro" size="40"/>
        </td>
     </tr>
    <tr>
      <td>Email:</td>
      <td><input name="email" value="'.$pc[email].'" type="text" id="email" size="40" />
        </td>
    </tr>
    
     <tr>
      <td>Telefone:</td>
      <td><input name="telefone" value="'.$pc[telefone].'" type="text" id="telefone" size="40" />
        </td>
    </tr>
    
    <tr>
    <td>Senha:</td>
      <td><input name="senha" value="'.$pc[senha].'" type="password" id="senha" size="40"  />
    </tr>';
            
            echo '</tr>
    <tr>
      <td colspan="2"><p>
        <input name="alterar" type="submit" id="alterar" value="Concluir Alteracao" /> 
        
          <br>
          </p>';
          
}
        
	
        
        if (isset($_POST["alterar"])){
        
	     $id = $_POST['id'];
             $nome = $_POST['nome'];
             $cpf = $_POST['cpf'];
             $sexo = $_POST['sexo'];
             $dtnascimento = $_POST['dtnascimento'];
             $cep = $_POST['cep'];
             $endereco = $_POST['endereco'];
             $ncasa = $_POST['ncasa'];
             $bairro = $_POST['bairro'];
             $email = $_POST['email'];
             $telefone = $_POST['telefone'];
             $senha = $_POST['senha'];

    $altclientes = "UPDATE clientes SET id='$id', nome='$nome', cpf='$cpf', sexo='$sexo', dtnascimento='$dtnascimento', cep='$cep', endereco='$endereco', n_casa='$ncasa', bairro='$bairro', email='$email', telefone='$telefone', senha='$senha' WHERE id='$id'";
    mysql_query($altclientes) or die(mysql_error());

        echo "<script>
        alert('Atualização realizada com sucesso!');
        window.location='http://localhost/SisPizzaTccphp/pesquisarclientes.php';
        </script>";
       
        }
	?>
     
  </table>
              </table>
         
       </head>    
</html>