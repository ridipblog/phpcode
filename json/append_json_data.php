<?php
$jsonString = file_get_contents('test.json');
$data = json_decode($jsonString, true);
$locations = array(
    'title' => 'Sualkuchi'
);
$data[] = $locations;
$jsonString = json_encode($data);
file_put_contents('test.json', $jsonString);
echo $jsonString;
?>