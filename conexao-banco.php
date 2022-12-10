<?php
 //conectando com o localhost - mysql
        $conect = mysql_connect("localhost","root","123" );
        if (!$conect)
            die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
        //conectando com a tabela do banco de dados
        $banco = mysql_select_db("pizzabd",$conect);
        if (!$banco)
            die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
       
?>
