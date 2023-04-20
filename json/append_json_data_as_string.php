<?php

function insert_as_object(){
    $jsonString=file_get_contents("test.json");
    $data=json_decode($jsonString,true);
    $locations=array(
        'title'=>'jaipur'
    );
    $data[]=$locations;
    $jsonString=json_encode($data);
    file_put_contents("test.json",$jsonString);
}

function convert_object_string(){
    $jsonString=file_get_contents("test.json");
    $data=json_decode($jsonString,true);
    $jsonString=json_encode($data);
    $stringData="private_title = '" .$jsonString . "';";
    file_put_contents("test.json",$stringData);
}
convert_object_string();
// insert_as_object();
?>