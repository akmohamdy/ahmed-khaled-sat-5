<?php 
include_once "connect.php";
if(isset($_GET['num'])){
    $num=$_GET['num'];
    $stmt=$con->prepare("SELECT * FROM products ORDER BY productCode DESC LIMIT $num ");
    $stmt->execute();
    $prods=$stmt->fetchAll();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET" action="last-orders.php">
        <label>Number:</label>
        <input type="number" name="num">
        <input type="submit">
    </form>

    <?php if(isset($_GET['num'])){
            foreach($prods as $prod){   
    
                echo $prod['productCode']." ".$prod['productName']."<br>";
    }}?>
</body>
</html>