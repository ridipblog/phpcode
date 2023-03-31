<?php

$conn=mysqli_connect('localhost',"root","","test");
if(mysqli_connect_error()){
    echo "Error";
}
if (isset($_GET['id'])) {
    $sql="select * from files where id=".$_GET['id'];
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    header("Content-type:".$row['image_type']);
    echo $row['image_data'];
    // $file=$row['image_data'];
    // echo file_get_contents('data:application/pdf;base64,'.base64_encode($file));
}
?>