<?php
function index(){
  include 'models/taskModel.php';
  include 'models/userModel.php';

//  $_SESSION['user'] = user();
  $id = $_SESSION['user']['id'];
  $task = getAllTasks($id);

  return ['view'=>'taskindex.php',
          'tasks'=>'$tasks'];

}
