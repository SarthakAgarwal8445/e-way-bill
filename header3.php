<?php
include('connect.php');
$add_querry=mysqli_query($conn,"Select * from `contact_page`")or die('query failed');
$row_count=mysqli_num_rows($add_querry);


?>