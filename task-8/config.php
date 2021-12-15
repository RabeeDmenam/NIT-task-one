
<?php

$dbserver = 'localhost';
$dbusername= 'root';
$dbpassword= '';
$dbname= 'nitblog';

$connection = mysqli_connect($dbserver,$dbusername,$dbpassword,$dbname);

if($connection){
    echo"connected"."<br>";
}else{  

   
    echo "error";
  // die("error",mysqli_error($connection));
}

?>
