<?php
include('connect.php');
$select_house=mysqli_query($conn,"Select * from `ebill`")or die('query failed');
$row_count=mysqli_num_rows($select_house);

?>