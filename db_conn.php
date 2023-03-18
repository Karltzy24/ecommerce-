<?php
include_once *db_conn.php";
$item_name = $_POST['new_product'];
$item_price = $_POST['newitem_price'];

$sql = "IINSERT INTO products (item_name, item_price) VALUES (?, ?)";

$stmt = mysqli_stmt_init($conn);
if (!mysql_stmt_prepare($stmt, $sql)){
    echo "Erro:" .mysql_error($conn);
    exit();
}

mysqli_stmt_bind_param($stmt, "ss", 
$item_name, $item_price);

if (mysqli_stmt_execute($stmt)){
   //Redirect to the index page 
   header('Location: index.php');
} else {
  echo "Error:" .mysql_error($conn);
}

?>



