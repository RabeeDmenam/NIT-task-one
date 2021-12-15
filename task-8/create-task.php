<?php

require './helper.php';
require './config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // CODE ...... 
    $task_title = Clean($_POST['task_title']);
    $task_description = Clean($_POST['task_description']);
    $task_start_date = Clean($_POST['task_start_date']);
    $task_end_date = Clean($_POST['task_end_date']);
    // $task_start_date = Clean($_POST['task_start_date']);


    # Validation ...... 
    $errors = [];

    # Validate task_title 
    if (!validate($task_title, 1)) {
        $errors['task_title'] = "Field Required";
    }
    # Validate task_description 
    if (!validate($task_description, 1)) {
        $errors['task_description'] = "Field Required";
    }
    # Validate task_start_date 
    if (!validate($task_start_date, 1)) {
        $errors['task_start_date'] = "Field Required";
    }
    if (!validate($task_end_date, 1)) {
        $errors['task_end_date'] = "Field Required";
    }

    # Validate image 
    if (!validate($_FILES['image']['name'], 1)) {
        $errors['Image'] = "Field Required";
    } else {

        $tmpPath    =  $_FILES['image']['tmp_name'];
        $imageName  =  $_FILES['image']['name'];
        $imageSize  =  $_FILES['image']['size'];
        $imageType  =  $_FILES['image']['type'];

        $exArray   = explode('.', $imageName);
        $extension = end($exArray);

        $FinalName = rand() . time() . '.' . $extension;

        $allowedExtension = ["png", 'jpg'];

        if (!validate($extension, 5)) {
            $errors['Image'] = "Error In Extension";
        }
    }

    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            # code...
            echo '* ' . $key . ' : ' . $value . '<br>';
        }
    } else {

        // db .......... 

        $desPath = './uploads/' . $FinalName;

        if (move_uploaded_file($tmpPath, $desPath)) {

            $sql = "insert into task (task_title,task_description,task_start_date,task_end_time,image) values ('$task_title','$task_description','$task_start_date','$task_end_date','$FinalName')";
            $op  = mysqli_query($connection, $sql);

            if ($op) {
                echo 'record has been saved successfly ' . header("Location: index.php");;
            } else {
                echo 'Error Try Again '."<br>" . mysqli_error($connection);
            }
        } else {
            echo 'Error In Uploading file';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>add task</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>add new task </h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">title</label>
                <input type="text" class="form-control" id="" name="task_title" placeholder="Enter title">
            </div>

            <div class="form-group">
                <label for="">task_description</label>
                <input type="text" class="form-control" name="task_description" placeholder="task_description">
            </div>
            <div class="form-group">
                <label for="">task_start_date</label>
                <input type="date" class="form-control" name="task_start_date" placeholder="task_start_date">
            </div>
            <div class="form-group">
                <label for="">task_end_date</label>
                <input type="date" class="form-control" name="task_end_date" placeholder="task_end_date">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Image</label>
                <input type="file" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>