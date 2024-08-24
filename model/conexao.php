<?php

class Conexao{

function Conectar(){
            $con = new pdo("mysql:host=localhost;dbname=LOJAK","root","");
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $con;
        }
    }
?>
