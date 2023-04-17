<?php

$id = $_GET['id'];
include('config/db_connection.php');
$sql = "DELETE FROM products WHERE id='$id'";
mysqli_query($conn, $sql);
mysqli_close($conn);
header('Location: index.php');

?>