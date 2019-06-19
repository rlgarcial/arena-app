<?php

 include('DatabaseProperties.php');
 //use ArenaAp\Utils\DatabaseProperties;

class DatabaseConnection
{
    function getConnection()
 {
     try
     {
        $HOST = 'localhost';
        $DATABASE = 'arena_app';
        $USERNAME = 'root';
        $PASSWORD = '';
        $DSN = "mysql:host=$HOST;dbname=$DATABASE";
         $connection = new PDO($DSN, $USERNAME, $PASSWORD);

         return [
             'connection' => $connection,
             'message' => 'Connection successfully'
         ];
    } catch(PDOException $pdoe)
        {
        return [
           'connection' => null,
           'message' => $pdoe->getMessage()
        ];
    }
}
 
}

?>