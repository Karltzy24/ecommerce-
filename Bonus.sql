PART 1
Situation: A user has accidentally deleted some important data from their account.

Solution: You can create a display that allows users to restore deleted data. The display should ask users to select the data they want to restore and provide a list of available backups. Once the user selects the backup they want to restore, the system should restore the data and display a message to the user confirming the action.                                                                                                        SELECT * FROM deleted_data WHERE user_id = [user_id] ORDER BY deleted_date DESC; Once the user selects the data they want to restore, you can use an INSERT statement to insert the data back into the database                  INSERT INTO user_data (user_id, data) VALUES ([user_id], [restored_data]);

PART 2
Situation: A new supplier has recently been added to the Sheesh-lingan supplier list, and their product inventory must be entered into the system database.

Solution using Insert:

To add the new supplier and their products to the database, the INSERT statement can be used.                                                                                                                                             INSERT INTO suppliers (supplier_name, supplier_address, supplier_contact)
VALUES ('New Supplier', '420 Main Street', '123-4444');

INSERT INTO products (product_name, supplier_id, price, quantity)
VALUES ('Pork', LAST_INSERT_ID(), 20000, 50),
('Beef', LAST_INSERT_ID(), 25000, 50);

PART 3
Situation:
Presume I own a Sizzling House and have a database system that stores all of our customer data, including their orders and purchases. One day, a customer contacts me and informs me that they made an error in their order and would like to add an item to their purchase.

Solution:
To update the database to reflect the customer's request, I'd need to do the following:

Identify the customer's record in the database using their unique ID or email address.
Retrieve the existing order details for that customer.
Add the new item to the order details, ensuring that all relevant information such as product name, quantity, and price are included.
Calculate the updated total cost of the order, taking into account any applicable discounts or taxes.
Update the order total and the order details in the customer's record in the database.
Send a confirmation email to the customer with the updated order details.                                         
UPDATE customers
SET order_details = CONCAT(order_details, ', New Product'),
total_cost = (total_cost + New_Product_Price)
WHERE customer_id = 'customer_id';

PART 4
BONUS: Write any other Situational Cases that you will encounter with your own Web Systems - related to your Systems Database. Provide similar solution using Delete
Delete a product that is no longer being sold or has been discontinued. To accomplish this, you can use the DELETE SQL statement to remove the product information from the database.                                                                                                                                  DELETE FROM products
WHERE product_id = [product_id];
