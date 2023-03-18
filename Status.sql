SELECT 
  o.order_status,
  o.order_id,
  u.user_name,
  oi.item_name,
  SUM(oi.item_qty * oi.item_price) AS total_amount,
  SUM(oi.item_qty) AS total_qty
FROM orders o
JOIN order_items oi ON o.order_id = oi.order_id
JOIN users u ON o.user_id = u.user_id
WHERE o.order_status = 'Delivered'
GROUP BY o.order_status, o.order_id, u.user_name, oi.item_name;
