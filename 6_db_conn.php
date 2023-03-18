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
