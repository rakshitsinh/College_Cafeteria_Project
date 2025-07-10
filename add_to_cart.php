<?php
session_start();
include 'db_connection.php';  // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit;
}

// Get the JSON input from the AJAX request
$data = json_decode(file_get_contents('php://input'), true);

$item_name = $data['item_name'];
$price = $data['price'];
$quantity = $data['quantity'];
$user_id = $_SESSION['user_id'];  // Get the logged-in user's ID

try {
    // Insert the item into the cart_items table
    $stmt = $conn->prepare("INSERT INTO cart_items (Id, item_name, price, quantity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isdi", $user_id, $item_name, $price, $quantity);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add item.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
