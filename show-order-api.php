<?php 
include_once "connect.php";
header('Content-Type: application/json');
if(isset($_GET['orderNumber'])){
    $orderNumber=$_GET['orderNumber'];
    $stmt=$con->prepare("SELECT * FROM orders WHERE orderNumber = '$orderNumber'");
    $stmt->execute();
    $order=$stmt->fetch();
    echo json_encode($order);
}

?>