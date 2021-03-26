<?php 
include_once "connect.php";
if(isset($_GET['prodname'])){
    $prodname=$_GET['prodname'];
    $stmt=$con->prepare("SELECT SUM(quantityOrdered) AS prodsum FROM orderdetails WHERE productCode = (SELECT productCode FROM products WHERE productName = '$prodname') ");
    $stmt->execute();
    $prods=$stmt->fetch();
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
    <form method="GET" action="product-quantity-orderded.php">
        <label>product name:</label>
        <input type="text" name="prodname">
        <input type="submit">
    </form>

    <?php if(isset($_GET['prodname'])) echo $prods['prodsum'];?>
</body>
</html>