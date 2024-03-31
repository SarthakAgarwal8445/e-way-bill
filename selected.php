<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php  include('header.php') ?> 
<div class="container">
<h2>Houses Selected</h2>
    <section class="display_bill">


    <div class="card-body">
        <form action="" method="GET" >
            <div class="row">
                <div class="col-md-5">
                    <div class="input-group-mb-3">
                      <select name="sort_numeric" class="form-control">
                        <option value="">--Select Option--</option>
                        <option value="low-high"<?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric']=="low-high") {echo "selected";} ?>>low-high</option>
                        <option value="high-low"<?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric']=="high-low") {echo "selected";} ?>>high-low</option>
                       
                      </select>
                        <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">Filter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


        <table>

        <?php

            $sort_option="";
            if(isset($_GET['sort_numeric'])){
              if($_GET['sort_numeric']=="low-high"){
                $sort_option="ASC";
              }elseif($_GET['sort_numeric']=="high-low"){
                $sort_option="DESC";
              }
            }
            $query="SELECT * FROM ebills ORDER BY bill $sort_option";
            $query_run=mysqli_query($conn,$query);
            if($query_run){
            $display_bill=mysqli_query($conn,"select * from `ebill`");
             
            $num=1;
            if(mysqli_num_rows( $display_bill)>0){

                echo "   <table>
                <thead>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>HouseNo</th>
                    <th>Bill</th>
                    <th>ID</th>
                    <th>Points</th>
                  
                </thead>
                <tbody>";
                while( $row=mysqli_fetch_assoc($display_bill)) {
                    $Name=$row['name'];
                    $HouseNo=$row['address'];
                    $Bill=$row['bill'];
                    $ID=$row['id'];
                    $Points=$row['points'];
                  
                    
                  if($Bill<=2000 || $Bill>2000){
                  

                    ?>
                   
                    <tr>
                       
                  
                   <td><?php echo $num ?></td>
                    <td><?php echo $Name ?></td>
                    <td><?php echo $HouseNo ?></td>
                    <td><?php echo $Bill ?></td>
                    <td><?php echo $ID ?></td>
                    <td><?php echo $Points ?></td>
                    </tr>

            
<?php

 $num++;
 
   };}
}}else{
    echo "<div class='empty_text'> No products Available </div>";
}



?>
   
</tbody>
</table>




</body>
</html>