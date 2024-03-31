<?php
include('connect.php');
if (isset($_POST['add_company'])){
    $company_name=$_POST['company_name'];
    $company_price=$_POST['industry'];
    $company_headquarter=$_POST['headquarter'];
    $product_image=$_FILES['product_image']['name'];
    $product_image_temp_name=$_FILES['product_image']['tmp_name'];
    $product_image_folder='Photos/'.$product_image;


    $insert_query=mysqli_query($conn,"insert into `company` (company_name,industry,headquarters,image) values('$company_name',' $company_price',' $company_headquarter',' $product_image_folder')") or die("Insert querry failed");

    if($insert_query){
       
        move_uploaded_file($product_image_temp_name, $product_image_folder);
        
     

        $display_message= "product inserted successfully";
    }else{
        $display_message= "there is some error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Details</title>
    
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&family=Roboto:ital@1&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" >
   <link rel="stylesheet" href="company.css">
   

</head>
<body>
    
    <?php  include('header2.php') ?>
    
   
    
   <div class="container">

   
   <?php
     if(isset($display_message)){
     echo "<div class='display_message'>
     <span>$display_message</span>
     <i class='fas fa-times' onclick='this.parentElement.style.display=`none`'; ></i>
     </div>";
     }
   ?>



      <section>
        <h3 class="heading">Add Company Details </h3>
        <form action="" method="post" class="add_company" enctype="multipart/form-data">
            <input name="company_name" type="text" placeholder="Enter Company Name" class="input_fields" required>
            <input name="industry" type="text" min="0" placeholder="Enter Industry" class="input_fields" required>
            <input name="headquarter" type="text" min="0" placeholder="Headquarters in India" class="input_fields" required>
            <input name="product_image" type="file"  class="input_fields" required accept="image/png, image/jpg, image/jpeg">
            <input name="add_company" type="submit"  class="submit_btn" value="Add Company">
        </form>
      </section>


   </div>



    <script src="js/script.js"></script>
</body>
</html>