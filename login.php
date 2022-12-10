<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>.::PAINEL DE CONTROLE DO SISPIZZA::.</title>
       
    </head>
    <body background="img\fundo.jpg">

   
                <form name="logar" id="logar" method="post" action="testelogin.php" onsubmit="return validaCampo(); return false;">
	<div align="center">
	<center>
             <center><img src="img/logo.png" width="200" height="200"></center>
	
	<table bgcolor="#FFFF66" width="300" cellpadding="8" style="border-radius:15px;">
	
        <tr>
            <td colspan="2"><div align="center"></div>
            <p>
            <center><b><font class="texto">Área do Administrador<br>
                            Efetue o Login:</font></b></center></td>
       </tr>
       <tr align="center"><td>
      	  <b><font class="font">CPF:</font></b></font></td>
          <td><input type="text" id="login" name="login" size="20">
          
          </tr>
       <tr align="center"><td>
          <b><font class="font">Senha:</font></b></font></td>
	  <td><input type="password" id="senha" name="senha" size="20">
          
       </tr>
       <tr align="center">
           <td colspan="3" align="center">
           <div align="center"><input type="Submit" value="Logar" maxlength="10"/>
           </div></td></tr>
      
           </table></center>
        </div>
</form>
</body>
</html>