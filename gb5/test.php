 <?php
include('connect.php');


   $query = "SELECT `count` FROM galleryBig WHERE id = 27";

   $result = mysqli_fetch_assoc($mysqli->query($query)); 
    print_r($result);
    echo $result['count'];
if($result) echo 'y'; else echo 'n';