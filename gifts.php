<?php
include('connect.php')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gift Hampers</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&family=Roboto:ital@1&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="index.css">
</head>

<body>

<?php  include('header2.php') ?> 

<div class="container">
    <section class="display_product">
        <table>
            


            <?php
            $display_product=mysqli_query($conn,"select * from `company`");
             
            $num=1;
           
            if(mysqli_num_rows( $display_product)>0 ){

                echo "   <table>
                <thead>
                <th>S.No</th>
                <th>Product Image</th>
                <th>Company Name</th>
                <th>Industry</th>
                <th>headquarter </th>
                </thead>
                <tbody>";
               
               while( $row=mysqli_fetch_assoc($display_product)) {
                $company_name=$row['company_name'];
                $product_image=$row['image'];
                $industry=$row['industry'];
                $headquarter=$row['headquarters'];
                $dir_path="photos/";
                
                
               
            
               ?>
               
                  <tr>
                   
                   <td><?php echo $num ?></td>
                    <td> <img src="<?php echo $product_image ?>" height="100" width="100" alt="img"></td>
                    <td><?php echo $company_name ?></td>
                    <td><?php echo $industry?></td>
                    <td><?php echo $headquarter?></td>
                    
                    
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
    </section>
</div>


</body>
</html>