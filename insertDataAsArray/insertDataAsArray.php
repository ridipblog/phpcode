<?php
$conn=new mysqli("localhost","root","","users");
    function insertData($conn){
        $data=array("name 2","password 2","city 2");
        $dataEncoded=json_encode($data);
        $result=true;
        $sql="INSERT INTO array_data(info,category)VALUES(?,?)";
        $result=$conn->prepare($sql);
        $category="Coder 3";
        $result->bind_param('ss',$dataEncoded,$category);
        $result->execute();
        $result->close();
    }
    insertData($conn);
    function getData($conn){
        $sql="SELECT * FROM array_data";
        $result=$conn->query($sql);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        $result->close();
        foreach($rows as $row){
            $dataDecoed=json_decode($row['info']);
            echo $row['category']."<br>";
            foreach($dataDecoed as $data){
                echo $data."<br>";
            }
        }
    }
    getData($conn);
?>