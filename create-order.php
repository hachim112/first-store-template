<?php
// Check if the request is coming from the same origin
if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] != 'https://your-website.com/your-page') {
  die('Unauthorized access');
}

// Get the form data
$quantity = $_POST['quantity'];
$name = $_POST['name'];
$email = $_POST['email'];

// Create a new order in WooCommerce
$order = wc_create_order(array(
  'customer_id' => 0, // Guest customer
  'status' => 'pending',
  'currency' => get_woocommerce_currency(),
  'billing_first_name' => $name,
  'billing_email' => $email
));

// Add the product to the order
$product_id = 123; // Replace with the ID of the product you want to add
$product = wc_get_product($product_id);
wc_add_order_item($order->get_id(), array(
  'product_id' => $product_id,
  'quantity' => $quantity
));

// Update the order totals
wc_update_order_item_totals($order->get_id());

// Send a success response
echo json_encode(array('message' => 'Order created successfully'));

?>