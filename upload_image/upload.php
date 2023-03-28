<?php
include "config.php";
$imgData = file_get_contents($_FILES['userImage']['tmp_name']);
$imgType = $_FILES['userImage']['type'];
$sql = "INSERT INTO images(image_type ,image_data) VALUES(?, ?)";
$statement = $conn->prepare($sql);
$statement->bind_param('ss', $imgType, $imgData);
$current_id = $statement->execute();
print_r($_FILES['userImage']);
echo "Done";
?>
<img src="displayImage.php?id=<?php $imageID=1; echo $imageID; ?>">
