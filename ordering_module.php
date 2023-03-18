	</form>

</body>
<script src="js/bootstrap.js"></script>
</html>

<?php
// Connect to database
include_once 'db_conn.php';
?>

<form>
<?php
// View the orders
$sql = "SELECT o.name, o.address, o.email, o.total, o.status, o.date_ordered_ts, o.order_id, 
			od.quantity, 
			m.meal_name, m.meal_price
	FROM orders o
	JOIN order_details od ON o.order_id = od.order_id
	JOIN meals m ON od.meal_id = p.meal_id
	WHERE o.order_id";
	
$result = mysqli_query($conn, $sql);

// check if any rows were returned
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Product: " . $row['meal_name'] . "<br>";
        echo "Quantity: " . $row['quantity'] . "<br>";
        echo "Price: " . $row['meal_price'] . "<br>";
        echo "Name: " . $row['name'] . "<br>";
        echo "Address: " . $row['address'] . "<br>";
        echo "Email: " . $row['email'] . "<br><br>";
		echo "Status: " . $row['status'] . "<br>";
        echo "Date Ordered: " . $row['date_ordered_ts'] . "<br>";
		echo "Total Price: " . $row['total'] . "<br><br>";
    }
} else {
    echo "No orders found.";
}
?>

</form>


<html>
<head>
	<meta charset="UTF-8">
	<title>View Order</title>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<form action="index.php" method="post">
	<input type="submit" value="Buy Again">
	</form>

</body>
<script src="js/bootstrap.js"></script>
</html>
