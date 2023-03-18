<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>My Shop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Welcome to Sheesh-lingan</h1>

	<?php
// Connect to database
include_once 'db_conn.php';


	// Retrieve the product information from the database
	$query = "SELECT * FROM meals";
	$result = mysqli_query($conn, $query);

	// Display the meal information on the shop interface
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<div>';
			echo '<h2>' . $row['meal_name'] . '</h2>';
			echo '<p>Price: ₱' . $row['meal_price'] . '</p>';
			echo '<button><a href="order_form.php?meal_id=' . $row['meal_id'] . '">Order Now</a></button>';
			echo '</div>';
		}
	}

	// Close the database connection
	mysqli_close($conn);
	?>

</body>
<script src="js/bootstrap.js"></script>
</html>

<?php
// Connect to database
include_once 'db_conn.php';



// Retrieve product data from database
$sql = "SELECT * FROM meals";
$result = mysqli_query($conn, $sql);

// Create order form
echo '<form action="place_order.php" method="post">';
echo '<table>';
echo '<tr><th>Product</th><th>Quantity</th><th>Price</th></tr>';

while ($row = mysqli_fetch_assoc($result)) {
  echo '<tr>';
  echo '<td>' . $row["meal_name"] . '</td>';
  echo '<td><input type="number" name="quantity[' . $row["meal_id"] . ']" value="0"></td>';
  echo '<td>$' . $row["meal_price"] . '</td>';
  echo '</tr>';
}

echo '</table>';

echo '<label for="name">Name:</label>';
echo '<input type="text" name="name" required>';

echo '<label for="address">Address:</label>';
echo '<input type="text" name="address" required>';

echo '<label for="email">Email:</label>';
echo '<input type="email" name="email" required>';

echo '<input type="place" value="Place Order">';
echo '</form>';

mysqli_close($conn);
?>

<?php
// Connect to database
include_once 'db_conn.php';

// Retrieve form data
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$products = $_POST['quantity'];

// Calculate order total
$total = 0;
foreach ($products as $id => $quantity) {
  $sql = "SELECT meal_price FROM meals WHERE meal_id = '$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $price = $row['meal_price'];
  $total += $price * $quantity;
}

// Insert order into database
$status = 'P'; // set status as 'P' for pending
$timestamp = date("Y-m-d H:i:s"); // get current timestamp
$sql = "INSERT INTO orders (name, address, email, total, status, date_ordered_ts) VALUES ('$name', '$address', '$email', $total, '$status', '$timestamp')";
mysqli_query($conn, $sql);
