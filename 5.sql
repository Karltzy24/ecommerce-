SELECT 
  i.item_id,
  i.item_name,
  SUM(oi.item_qty) AS total_qty
FROM orders o
JOIN order_items oi ON o.order_id = oi.order_id
JOIN users u ON o.user_id = u.user_id
JOIN items i ON oi.item_id = i.item_id
WHERE i.item_status = 'active' 
  AND u.user_status = 'active' 
  AND o.order_status = 'pending' 
  AND YEAR(o.order_date) >= 2023 
  AND o.order_date >= '2022-12-31'
GROUP BY i.item_id, i.item_name;
