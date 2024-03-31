<?php
include('connect.php');
$add_user=mysqli_query($conn,"Select * from `users`")or die('query failed');
$row_count=mysqli_num_rows($add_user);


?>