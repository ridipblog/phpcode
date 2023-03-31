<?php
$conn=mysqli_connect('localhost',"root","","test");
if(mysqli_connect_error()){
    echo "Error";
}

if(isset($_REQUEST['upload'])){
    $imgData = file_get_contents($_FILES['userImage']['tmp_name']);
    $imgType = $_FILES['userImage']['type'];
    $sql = "INSERT INTO files(image_type ,image_data) VALUES(?, ?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param('ss', $imgType, $imgData);
    $current_id = $statement->execute();
    print_r($_FILES['userImage']);
    echo "Done";
}
?>

<a href="display.php">Display Files</a>
<form action="upload.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="file" name="userImage" ><br>
    <button type="submit" name="upload">Upload</button>
</form>