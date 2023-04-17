<?php
    $json=file_get_contents("json.json");
    $json_data=json_decode($json,true);
    echo "<h1>Json File Read With Array Name</h1>";
    // echo "<br>".$json_data['student'][0]['name'];
    foreach($json_data as $data){
        foreach($data as $person){
            echo "<p>".$person['name']."</p>";
            echo "<p>".$person['class']."</p>";
        }
    }
    echo "<h1>Json File Read With out Arrya Name</h1>";
    $json_1=file_get_contents("json_1.json");
    $json_data_1=json_decode($json_1);
    // echo $json_data_1[0]->name;
    foreach($json_data_1 as $data){
        echo "<p>".$data->name."</p>";
    }
?>
<html>
    <head>

    </head>
    <body>
        
    </body>
</html>