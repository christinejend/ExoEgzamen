<?php

function dbCo(){
// 1- Charger fichier db
  $dbInfos = @parse_ini_file('configs/db.ini');
//2- Sécuriser le nom - host
 $dsn = sprintf('mysql:dbname=%s;host=%s', $dbInfos['DB_NAME'], $dbInfos['DB_HOST'] );
//3- Connexion 2-user-mdp- tab option
  try{
    return new PDO(
        $dsn,
        $dbInfos['DB_USER'],
        $dbInfos['DB_MDP'],
         [
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
           ]

      );
//4- catch les except'
  }catch(PDOExeption $e){
    die ('Erreur lors de la connexion a la db' . $e->getMessage());
  }
} // END DBCO
