<?php

session_start(); //iniciamos a sessão que foi aberta



session_destroy(); //pei!!! destruimos a sessão ;)

session_unset(); //limpamos as variaveis globais das sessões

unset($_SESSION['carrinho']);
/*aqui você pode por alguma coisa falando que ele saiu ou fazer como eu, coloquei redirecionar para uma certa página*/

 echo "
     <html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
     <script>
 alert ('Você está saindo...');    
window.location='http://localhost/SisPizzaTccphp/login.php';

</script>";



?> 

