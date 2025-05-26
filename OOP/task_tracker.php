<?php
require('First.php');
session_start();
$user=$_SESSION['user'];
if ($user==null){
    header('Location:../signin.php');
}



class TaskTracker extends First{
public function createTask($task,$time){
    $completed=0;
    $user=$_SESSION['user'];
    $id = $user['id'];
$query = "INSERT INTO `tasks_tb`(task,time,completed,users_id)VALUES(?,?,?,?)";
$stmt= $this->connect->prepare($query);
$stmt->bind_param('ssii',$task,$time,$completed,$id);
$saveToDB= $stmt->execute();

if($saveToDB){
    return['staus'=>true,'message'=>'Task saved to storage'];
    
} else{
    ['status'=>false,'message'=>'Task not saved.please add again'];
}
}
}
if (isset($_POST['add'])){
    
    $task=$_POST['task'];
    $time=$_POST['time'];

    $taskTracker=new TaskTracker;
    $response=$taskTracker->createTask($task,$time); 
    print_r($response);
}

$taskTracker = new TaskTracker;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
     <form action ="" method="POST">
        <div class="card mx-auto col-4 py-1 px-2 mt-4 shadow-sm">
            <h4 class="text-center fw-medium mx-auto fs-4" >Task Tracker</h4>
            <div class=" form-group mb-2" >
            <label for="">Task</label>
            <input type="text" placeholder="Add a new text" class="form-control" name="task">
            </div>
            <div class=" form-group mb-2" >
            <label for="">Time</label>
            <input type="time"  class="form-control" name="time">
            </div>
            <div class=" form-group mb-2 justify-content-center">
             <button class="btn-md bg-dark text-light" name="add" type="submit">Add a Task</button>
            </div>
        </div>
</body>
</html>