<?php


if($_SERVER['REQUEST_METHOD'] == "POST")

{
    $ErrorMessage= [];


    $name= $_POST['name'];
    $email= $_POST['email'];
    $Password= $_POST['Password'];
    $address= $_POST['address'];
    $linkedin= $_POST['linkedin'];

    if(empty($name)) {$ErrorMessage['name']  = "name Required";}
    if(empty($email)) {$ErrorMessage['email']  = "email Required";}
    if(empty($password)) {$ErrorMessage['password']  = "password Required";}
    if(empty($address)) {$ErrorMessage['address']  = "address  Required";}
    if(empty($linkedin)) {$ErrorMessage['linkedin']  = "linkedin url  Required";}


    if(strlen($Password)<6) {$ErrorMessage['Password']  = "Password Length can't be less than 6 char ";}

    if ($address>10) {$ErrorMessage['address']  = "minimum allowed address  is 10 chars ,  please enter valid address  ";}



    if(count($ErrorMessage) > 0){
        foreach ($ErrorMessage as $key => $value) {

            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{

        echo $name."<br>".$email."<br>".$Password."<br>".$address."<br>".$linkedin."<br>";
    }


}



?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <div class="row">

        <form  action="<?php echo $_SERVER['PHP_SELF'];?>"   method="post">

            <div class="form-group">
                <label for="exampleInputEmail1"> name</label>
                <input name="name" type="text" class="form-control"  placeholder="Enter name">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control"  placeholder="Enter email">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="Password" type="password" class="form-control " placeholder="Password">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1"> address</label>
                <input name="address" type="text" class="form-control" placeholder="Enter address">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"> linkedin</label>
                <input name="linkedin" type="text" class="form-control" placeholder="Enter your linkedin url ">

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>

        </form>


    </div>

</div>


</body>
</html>