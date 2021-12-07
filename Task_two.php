<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NIT</title>
</head>
<?php
function print_next()
{
    $cha = 'b';
    $next_cha = ++$cha;


    if (strlen($next_cha) > 1) {
        $next_cha = $next_cha[0];
    }
    echo $next_cha . "\n";
}
print_next();

?>
</body>

</html>