<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form </title>
</head>
<body>
<?php
if(isset($_POST['sub']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password =$_POST['password'];
    $address =$_POST['address'];
    $linkdin =$_POST['linkdin'];

    $errors = [];
    #  Validate Name ...
    if(empty($name)){
        $errors['name'] = "Field Required";
    }
    if(empty($email)){
        $errors['email'] = "Field Required";
    }
    if(empty($password && strlen($password))){
        $errors['password'] = "Field Required";
    }
    if(empty($address)){
        $errors['address'] = "Field Required";
    }
    if(empty($linkdin)){
        $errors['linkdin'] = "Field Required";
    }

    # Validate Email
    if(empty($email)){
        $errors['email'] = "Field Required";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Invalid Email";
    }




    if(!empty($_FILES['image']['name'])){

        $tmpPath    =  $_FILES['image']['tmp_name'];
        $imageName  =  $_FILES['image']['name'];
        $imageSize  =  $_FILES['image']['size'];
        $imageType  =  $_FILES['image']['type'];

        // name.ex

        $exArray   = explode('.',$imageName);
        $extension = end($exArray);

        $FinalName = rand().time().'.'.$extension;

        $allowedExtension = ["png",'jpg'];

        if(in_array($extension,$allowedExtension)){
            // code ....

            $desPath = './images/'.$FinalName;

            if(move_uploaded_file($tmpPath,$desPath)){
                echo 'Done  Uploaded sucssessfully ';
            }else{
                echo 'Error In Uploading file';
            }


        }else{
            echo 'check  Extension .... ';
        }

    }else
    {
        echo '*Image Field Required'."<br>";
    }




    if(count($errors) > 0){
        foreach ($errors as $key => $value) {
            # code...
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{

        echo "Your mame is ".$name."<br>"."your email is ". $email."<br>"."your password is ".$password."<br>"."your address is " . $address."<br>" ."your linkdin is ". $linkdin ;

    }

}


?>
<form method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                Name
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td>
                email
                <input type="email" name="email">
            </td>
        </tr>
        <tr>
            <td>
                password
                <input type="password" name="password">
            </td>
        </tr>

        <tr>
            <td>
                Linkdin
                <input type="url" name="linkdin">
            </td>
        </tr>
        <tr>
            <td>
                address
                <input type="text" name="address">
            </td>
        </tr>


        <tr>
            <td>
                Image
                <input type="file" name="image">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="submit" name="sub">
            </td>
        </tr>
    </table>
</form>


</body>
</html>





