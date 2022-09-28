<?php 

    $host = '127.0.0.1';
    $dbname = 'Infraction';
    $username = 'postgres';
    $password = '12345';
    /* $host = '127.0.0.1';
    $dbname = 'conducteur';
    $username = 'postgres';
    $password = 'mkf'; */
    $chemin = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

    try 
    {
        $bdd = new PDO($chemin);  
        //$bdd->exec("SET CHARACTER SET utf8"); 
    }
    catch(Exception $e)
    {
        die('Erreur '.$e->getMessage());
    }
    
    ?>