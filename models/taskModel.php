<?php
/*SELECT tasks.id AS taskId, tasks.description AS taskDescription, tasks.is_done AS taskIsDone
FROM tasks
LEFT JOIN task_user ON tasks.id = task_user.task_id
LEFT JOIN users ON task_user.user_id = users.id
WHERE users.id = :userId
ORDER BY description ASC
*/

function getAllTasks($id){
  include 'model.php';
  include 'userModel.php';

  $pdo = dbCo();
  if ( $pdo ){
    $sql= 'SELECT tasks.id AS taskId, tasks.description AS taskDescription, tasks.is_done AS taskIsDone
    FROM tasks
    LEFT JOIN task_user ON tasks.id = task_user.task_id
    LEFT JOIN users ON task_user.user_id = users.id
    WHERE users.id = :userId
    ORDER BY description ASC';

    try{
      $pdoSt = $pdo->prepare($sql);
      $pdoSt->execute([':userid'=> $id = $_SESSION['user']['id']]); //??
      return $pdoSt->fetchColumn();
    }catch(Exception $e){
      die('Erreur lors de la capture de vos tâches' . $e->getMessage());
    }
  }
}
