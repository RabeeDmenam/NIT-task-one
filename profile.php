<?php 
include('task-four.php');

//session_start();

 if(isset($_SESSION))
 {




    if(count($errors) > 0){
        foreach ($errors as $key => $value) {
            # code...
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{
           
                     echo "Your mame is ".$name."<br>"."your email is ". $email."<br>"."your 
                     password is ".$password."<br>"."your address is " . $address."<br>" ."your linkdin is ". $linkdin ;

    }


 }
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="/image" alt="">
    
</body>
</html>