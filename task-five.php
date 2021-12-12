<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

</body>
<?php

$data = file_get_contents("http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz");

$dataarray = json_decode($data, true);
foreach ($dataarray['data'] as $value) {
    $products_id = $value['products_id'];
    $products_name = $value['products_name'];
    $products_quantity = $value['products_quantity'];
    $products_model = $value['products_model'];
    $products_image = $value['products_image'];
    $products_date_added = $value['products_date_added'];
    $products_liked = $value['products_liked'];
    $products_description = $value['products_description'];
}
$filename = 'saved-data.txt';
$somecontent = json_encode($dataarray);
// Let's make sure the file exists and is writable first.
if (is_writable($filename)) {
    if (!$handle = fopen($filename, 'a')) {
        echo "Cannot open file ($filename)";
        exit;
    }
    // Write $content to our opened file.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
    }



    echo "Success, wrote  to file ($filename)";

    fclose($handle);
} else {
    echo "The file $filename is not writable";
}

?>

<div class="container">
    <div class="row">
        <section>
            <h1>List Of products </h1>
            <table class="table-bordered text-center">
                <tr>
                    <th>products_id</th>
                    <th>products_name</th>
                    <th> products_quantity</th>
                    <th>products_model</th>
                    <th>products_image</th>
                    <th>products_date_added </th>
                    <th>products_liked</th>
                    <!-- description commented as it too long  -->
                    <!-- <th>products_description</th> -->
                </tr>
                <?php
                // if (is_array($mydata) || is_object($mydata)) {
                foreach ($dataarray['data'] as $key =>  $value) {

                ?>
                    <tr>
                        <td><?php echo $value['products_id']; ?></td>
                        <td><?php echo $value['products_name']; ?></td>
                        <td><?php echo $value['products_quantity']; ?></td>
                        <td><?php echo $value['products_model']; ?></td>
                        <td><?php echo $value['products_image']; ?></td>
                        <td><?php echo $value['products_date_added']; ?></td>
                        <td><?php echo $value['products_liked']; ?></td>
                        <!-- description commented as it too long uncomment it  for display   -->
                        <!-- <td class="overflow-hidden"><? php  //echo $value['products_description'];
                                                            ?></td>  -->
                    </tr>

                <?php
                    // }
                }

                ?>
            </table>
        </section>

    </div>



</div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</tbody>
</table>

</html>