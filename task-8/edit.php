
<?php 

require './helper.php';
require './config.php';
require './checklogin.php';

# Get Data related to id ...... 
   $id = $_GET['id'];

   $sql = "select * from users where id = $id";
   $op   = mysqli_query($con,$sql);

     if(mysqli_num_rows($op) == 1){

        $data = mysqli_fetch_assoc($op);
     }else{

        $_SESSION['Message'] = "Access Denied";
        header("Location: index.php");
     }






if($_SERVER['REQUEST_METHOD'] == "POST"){

// CODE ...... 
$name     = Clean($_POST['name']);
$email    = Clean($_POST['email']);
// $password = Clean($_POST['password']);


# Validation ...... 
$errors = [];

# Validate Name 
if(!validate($name,1)){
    $errors['Name'] = "Field Required";
}


# Validate Email 
if(!validate($email,1)){
    $errors['Email'] = "Field Required";
}elseif(!validate($email,2)){
   $errors['Email'] = "Invalid Email Format";
}



  # Validate image 
  if(validate($_FILES['image']['name'],1)){
     
$tmpPath    =  $_FILES['image']['tmp_name'];
$imageName  =  $_FILES['image']['name'];
$imageSize  =  $_FILES['image']['size'];
$imageType  =  $_FILES['image']['type'];

$exArray   = explode('.',$imageName);
$extension = end($exArray);

$FinalName = rand().time().'.'.$extension;

$allowedExtension = ["png",'jpg'];

    if(!validate($extension,5)){
      $errors['Image'] = "Error In Extension";
    }

 }




   if(count($errors) > 0){
       foreach ($errors as $key => $value) {
           # code...
           echo '* '.$key.' : '.$value.'<br>';
       }
   }else{

    // db .......... 
   
    // old Image 
    $OldImage = $data['image'];


    if(validate($_FILES['image']['name'],1)){
      $desPath = './uploads/'.$FinalName;

        if(move_uploaded_file($tmpPath,$desPath)){

          unlink('./uploads/'.$OldImage); 
        }
    }else{
          $FinalName = $OldImage;
        }




     $sql = "update users set name = '$name' , email = '$email',image = '$FinalName' where id = $id";
     $op  = mysqli_query($con,$sql);

     if($op){
       $message =  'Data Updated';
     }else{
       $message =  'Error Try Again'.mysqli_error($con); 


                            
     }


   }

        $_SESSION['Message'] = $message;
        header("Location: index.php");


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Edit</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <h2>Edit Account</h2>


 <form  action="edit.php?id=<?php echo $data['id'];?>"   method="post" enctype="multipart/form-data">

 

 <div class="form-group">
   <label for="exampleInputName">Name</label>
   <input type="text" class="form-control" id="exampleInputName"  name="name"  value="<?php echo $data['name'];?>" aria-describedby="" placeholder="Enter Name">
 </div>


 <div class="form-group">
   <label for="exampleInputEmail">Email address</label>
   <input type="email"   class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $data['email'];?>"  aria-describedby="emailHelp" placeholder="Enter email">
 </div>



 
 <div class="form-group">
  <label for="exampleInputPassword">Image</label>
  <input type="file"   name="image" >
</div>

<img src="./uploads/<?php echo $data['image'];?>" height="80" width="80"><br>
 
 <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

</body>
</html>

