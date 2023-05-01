<?php
    $connection=mysqli_connect("localhost","root","","test");
    $limit=3;
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }
    $offset=($page -1)*$limit;
    $sql="SELECT * FROM parents ORDER BY id DESC LIMIT {$offset},{$limit}";
    $result=mysqli_query($connection,$sql);
    if(mysqli_num_rows($result) > 0){
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<style>
    .result_div{
        width:100%;
        display:flex;
        border:2px solid blue;
        flex-direction:column;
        margin-top:10px;
    }
    .result_div_1{
        flex-direction:row;
    }
    .result_div_1 a{
        margin:10px 20px 10px 20px;
    }
    .result_div p{
        font-size:20px;
        font-weight:bold;
    }
</style>
<body>
    <div class="result_div">
    <?php
        while($row=mysqli_fetch_assoc($result)){ ?>
        <p><?php echo $row['parents_name'] ; ?></p>
        <p><?php echo $row['parents_email'] ; ?></p>
        <?php } }?>
    </div>
    <?php 
        $sql="SELECT * FROM parents";
        $result=mysqli_query($connection,$sql);
        
        if(mysqli_num_rows($result)>0){
            $total_records=mysqli_num_rows($result);
            $total_pages=ceil($total_records/$limit);
            echo '<div class="result_div result_div_1">';
            for($i=1;$i<=$total_pages;$i++){
                echo '<a href="test.php?page='.$i.'">'.$i.'</a>';
            }
            echo '</div>';
        }
    ?>
    <script>
        
    </script>
</body>

</html>