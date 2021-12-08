<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NIT</title>
</head>
<?php



$students = [

    ["ahmed",20,3.4],
    ["x",23],
    ["y",22,3.4,'class A'],

];
foreach ($students as $key => $value)
{
    echo "{$key} => {$value} ";

    print_r($arr);
}

?>
</body>

</html>