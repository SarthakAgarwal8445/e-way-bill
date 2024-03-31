<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="design_table.css">
</head>
<body>
<?php  include('header.php') ?> 
<div class="container">
<h2>Electricity Bills </h2>
    <section class="display_bill">
        <table>
        <?php
            $display_bill=mysqli_query($conn,"select * from `ebill`");
             
            $num=1;
            if(mysqli_num_rows( $display_bill)>0){

                echo "   <table>
                <thead>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>HouseNo</th>
                    <th>Previous</th>
                    <th>Current</th>
                    <th>ID</th>
                    <th>Points</th>
                   
                </thead>
                <tbody>";
                while( $row=mysqli_fetch_assoc($display_bill)) {
                    $Name=$row['name'];
                    $HouseNo=$row['address'];
                    $Previous=$row['previous'];
                    $Current=$row['current'];
                    $ID=$row['id'];
                    $Points=$row['points'];
                   
                    ?>
                   
                    <tr>
                  
                   <td><?php echo $num ?></td>
                    <td><?php echo $Name ?></td>
                    <td><?php echo $HouseNo ?></td>
                    <td><?php echo $Previous ?></td>
                    <td><?php echo $Current ?></td>
                    <td><?php echo $ID ?></td>
                    <td><?php echo $Points ?></td>
                    </tr>

            
<?php

 $num++;
   };
}else{
    echo "<div class='empty_text'> No products Available </div>";
}

?>


   
</tbody>
</table>

<button class="button-85"><a href="points.php">Give Points</a></button>
</body>
</html>