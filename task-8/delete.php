<?php 
/// delete ...... 
require './config.php';
require './checklogin.php';
require './helper.php';

$task_id = $_GET['task_id'];
if(!validate($task_id,4)){
    $message =  'Invalid Number';
}else{

   $sql = "select * from task where id = $task_id";
   $op   = mysqli_query($con,$sql);

     if(mysqli_num_rows($op) == 1){
   
 $data = mysqli_fetch_assoc($op);

   $sql = "delete from users where id = $task_id ";
   $op  = mysqli_query($connection,$sql);


   if($op){

    unlink('./uploads/'.$data['image']); 

    $message = 'raw deleted';
   }else{
    $message = 'error Try Again !!!!!! ';
   }
}else{
    $message = 'Error In User Id ';
}

}

   $_SESSION['Message'] = $message;

   header("Location: index.php");


?>