<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>saved data </title>
</head>

<body>
    <?php

    $mydata = fopen("saved-data.txt", "r");
    while (!feof($mydata)) {
        // is_array( $mydata );  
        echo fgets($mydata) . "<br />";
    }
    fclose($mydata);



    ?>
    <div class="container">
        <div class="row">
            <section>
                <h1 class="btn-btn sucess">list of products </h1>
                <table class="table-bordered text-center">
                    <tr>
                        <th>products_id</th>
                        <th>products_name</th>
                        <th> products_quantity</th>
                        <th>products_model</th>
                        <th>products_image</th>
                        <th>products_date_added </th>
                        <th>products_liked</th>
                        <th>products_description</th>
                    </tr>
                    <?php
                    // if (is_array($mydata) || is_object($mydata)) {
               
                    foreach ($mydata['data'] as $key =>  $value) {

                    ?>
                        <tr>
                            <td><?php echo $value['products_id']; ?></td>
                            <td><?php echo $value['products_name']; ?></td>
                            <td><?php echo $value['products_quantity']; ?></td>
                            <td><?php echo $value['products_model']; ?></td>
                            <td><?php echo $value['products_image']; ?></td>
                            <td><?php echo $value['products_date_added']; ?></td>
                            <td><?php echo $value['products_liked']; ?></td>
                            <!-- <td class="overflow-hidden"><? php  //echo $value['products_description'];
                                                                ?></td>  -->
                        </tr>

                    <?php
                        // }
                    }

                    ?>
                    <a  href="opensaveddata.php" class="btn btn-primary">go to dsaved data</a>
                </table>
            </section>

        </div>



    </div>


</body>

</html>