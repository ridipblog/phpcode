<?php

include "config.php";
if (isset($_GET['id'])) {
    $sql="select * from images where id=".$_GET['id'];
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    header("Content-type:".$row['image_type']);
    echo $row['image_data'];
}
?>