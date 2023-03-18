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



<html>
<?php include_once "db_conn.php"; ?>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
 <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    <div class="container">
        <div class="row">
            
            <div class="col-9">
               <h3>PRODUCT LIST</h3>
                <?php
            
                  $productlist = query($conn, "select item_id, item_name, item_price from products where item_status='A'");
                 // var_dump($userlist);
                  echo "<hr>";
                       if(isset($_GET['update_status'])){
                            switch($_GET['update_status']){
                                case "success": echo "<div class='alert alert-success'>User Updated.</div>";
                                      break;
                                case "failed":  echo "<div class='alert alert-danger'>User Failed to be updated.</div>";
                                      break;
                                        
                            }
                       }
                  echo "<hr>";
                  
                  
                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                         echo "<th>Item Name</th>";
                         echo "<th>Item Price</th>";
                         echo "<th>Action</th>";
                    echo "</thead>";
                  foreach($productlist as $key => $row){
                      echo "<tr>";
                         echo "<td>" . $row['item_name'] . "</td>";
                         echo "<td>" . $row['item_price'] . "</td>";
                         echo "<td> <a class='btn btn-success' href='submit.php?&item_name=" .$row['item_name'] . "&item_price=" . $row['item_price']. "&item_id=". $row['item_id'] ."' > Update </a> </td>";
                         echo "<td> <a class='btn btn-danger' href='delete_item.php?item_id=". $row['item_id'] ." ' > Delete </a> </td>";
                    echo "</tr>";
                  }
                   echo "</table>";
                
                ?>
                
            </div>
            
        </div>
    </div>
</body>
<script src="js/bootstrap.js"></script>
</html>
