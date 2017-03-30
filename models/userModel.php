<?php

function user(){

include 'model.php';

 //$_SESSION['email'] = $_POST['email'];
 $_SESSION['pass'] = $_POST['password'];

// 1- Vérifier si il y a bien un connexion
  $pdo = dbCo();
//2- Requête préParent
 if($pdo){
    $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';

  //3 - Essai de la requete,
          //query = Exécute une requête SQL, retourne un jeu de résultats en tant qu'objet PDOStatement
          //fetchColumn =  Retourne une colonne depuis la ligne suivante d'un jeu de résultats
    try{
      $pdoSt = $pdo->prepare($sql);
      $pdoSt->execute([':email' =>  $_SESSION['email'],
                        ':password' =>  $_SESSION['pass']
                      ]);
      var_dump('User connected ' . $_SESSION['email']);
    return  $pdoSt->fetchColumn();
    }catch(Exception $e){
      die('Erreur lors de l\'enregistrement > ' .$e);
    }
  }
}

//SELECT * FROM users WHERE email = :email AND password = :password
