<?php 
    const SERVER="127.0.0.1:3306";
    const DB="sitio_web";
    const USER="root";
    const PASS="";
    const UTF8="utf8";

    const SGBD= "mysql:host=".SERVER.";dbname=".DB.";charset=".UTF8;

    class dbconnection{
        
        protected function connection()
        {
            $con = new PDO(SGBD,USER,PASS);
            return $con;
        }
    }
?>