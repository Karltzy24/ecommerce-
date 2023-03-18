SELECT 
  o.order_id,
  o.date_ordered,
  u.username,
  oi.item_name,
  SUM(oi.item_qty * oi.item_price) AS total_amount
FROM orders o
JOIN order_items oi ON o.order_id = oi.order_id
JOIN users u ON o.user_id = u.user_id
GROUP BY o.order_id, o.date_ordered, u.username, oi.item_name;
