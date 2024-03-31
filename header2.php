<?php
include('connect.php');
$add_company=mysqli_query($conn,"Select * from `company`")or die('query failed');
$row_count=mysqli_num_rows($add_company);


?>