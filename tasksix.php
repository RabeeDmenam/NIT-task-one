<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
// Database configuration    
$hostname = "localhost";
$username = "root";
$password = "";
$dbname   = "nitblog";

$connection = new mysqli($hostname, $username, $password, $dbname);


// Check connection 
if ($connection) {
    echo "connected" . "<br>";
} else {


    echo "error";
    // die("error",mysqli_error($connection));
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_FILES['image']['name'])) {
        $tmpPath    =  $_FILES['image']['tmp_name'];
        $imageName  =  $_FILES['image']['name'];
        $imageSize  =  $_FILES['image']['size'];
        $imageType  =  $_FILES['image']['type'];
        // name.ex
        $exArray   = explode('.', $imageName);
        $extension = end($exArray);
        $FinalName = rand() . time() . '.' . $extension;
        $allowedExtension = ["png", 'jpg'];

        if (in_array($extension, $allowedExtension)) {
            // code .... 

            $desPath = './images/' . $FinalName;

            if (move_uploaded_file($tmpPath, $desPath)) {
                echo 'Done  Uploaded sucssessfully ';
            } else {
                echo 'Error In Uploading file';
            }
        } else {
            echo 'check  Extension .... ';
        }
    } else {
        echo '*Images Field Required' . "<br>";
    }

    $ErrorMessage = [];
    $title = $_POST['title'];
    $content = $_POST['content'];


    if (empty($title)) {
        $ErrorMessage['title']  = "title Required";
    }
    if (empty($title)) {
        $ErrorMessage['content']  = "title Required";
    }
    if (strlen($content) < 6) {
        $ErrorMessage['content']  = "content Length can't be less than 6 char ";
    }

    if (count($ErrorMessage) > 0) {
        foreach ($ErrorMessage as $key => $value) {

            echo '*==>' . $key . ' : ' . $value . '<br>';
        }
    } else {

        $sqlinsert = "INSERT INTO blog (title, content,image) VALUES (' $title', '$content','$FinalName')";
        if (mysqli_query($connection, $sqlinsert)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sqlinsert . "<br>" . mysqli_error($connection);
        }
    }
}










?>


<body>





    <div class="container mt-5">
        <div class="row">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

                <label for="exampleFormControlInput1" class="form-label">title</label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input name="content" type="text" class="form-control" id="exampleFormControlInput1" placeholder="content">
        </div>


        <div class="form-group">
            <label for="exampleFormControlFile1">img</label>
            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <button type="submit" class="btn btn-primary mt-4">submit</button>

        </form>




    </div>




    </div>



    <?php


    
    $records = mysqli_query($connection, "SELECT id, name, image  From blog");  // Use select query here 
    $data = mysqli_fetch_assoc($records);
    while ($data ) 
    {
        
        echo " <h5 class='card-title'>".   $data['title']."</h5>"."<br>".
         " <h5 class='card-title'>".   $data['content']."</h5>"."<br>";
       
  
    }

    ?>
 


</body>

</html>