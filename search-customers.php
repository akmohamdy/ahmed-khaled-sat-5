<?php 
include_once "connect.php";
if(isset($_GET['search_keyword'])){
    $search_keyword=$_GET['search_keyword'];
    $stmt=$con->prepare("SELECT * FROM customers WHERE customerName LIKE '%$search_keyword' OR customerName LIKE '$search_keyword%' OR customerName LIKE '%$search_keyword%' OR customerName  = '$search_keyword'");
    $stmt->execute();
    $custs=$stmt->fetchAll();
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
    <form method="GET" action="search-customers.php">
        <label>search_keyword:</label>
        <input type="text" name="search_keyword">
        <input type="submit">
    </form>

    <?php if(isset($_GET['search_keyword'])){
        foreach($custs as $cust){
            echo $cust['customerName']."<br>";
        }
    }?>
</body>
</html>