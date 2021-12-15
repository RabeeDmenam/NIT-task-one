<?php 

require './config.php';

//require './checklogin.php';

					
$sql = "select task_id,task_title,task_description,task_start_date,task_end_time,image from task ";

$op  = mysqli_query($connection,$sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }

    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1> List of tasks  </h1>
            <br>
         <!-- Welcome , //<?php// echo $_SESSION['user']['name'];?> -->
        </div>


    
        <a href="create.php">+ Account</a> || <a href="logout.php">LogOut</a> || <a class="btn btn-primary" href="create-task.php">add new task </a>  <br>


        <?php 
           
            // if(isset($_SESSION['Message'])){
            //     echo $_SESSION['Message'];
                
            //     unset($_SESSION['Message']);


            // }
        
        
        ?>




        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>task_id</th>
                <th>task_title</th>
                <th>task_description</th>
                <th>task_start_date</th>
                <th>task_end_time</th>
                <th>image</th>
                <th>action</th>
               
            </tr>

<?php 

while($data = mysqli_fetch_assoc($op)){

?>
    <tr>
       <td><?php echo $data['task_id'];?></td>
       <td><?php echo $data['task_title'];?></td>
       <td><?php echo $data['task_description'];?></td>
       <td><?php echo $data['task_start_date'];?></td>
       <td><?php echo $data['task_end_time'];?></td>
       <td><?php echo $data['image'];?></td>
                <td>
                    <a href='delete.php?id=<?php echo $data['task_id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='edit.php?id=<?php echo $data['task_id'];?>' class='btn btn-primary m-r-1em'>Edit</a>

                </td>
            </tr>
<?php 
}
?>

            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>