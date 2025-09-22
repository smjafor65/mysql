<?php
session_start();
include("db.config.php");

// Check if staff is logged in
if (!isset($_SESSION['staff'])) {
    header("Location: ../login.php");
    exit;
}

// Check if 'id' is provided in URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("❌ Invoice ID is missing in URL.");
}
echo "Invoice ID in URL: " . $_GET['id'];


$invoice_id = (int)$_GET['id']; // sanitize input

// Fetch invoice
$invoice_query = $conn->prepare("SELECT * FROM invoices WHERE id = ?");
$invoice_query->bind_param("i", $invoice_id);
$invoice_query->execute();
$invoice_result = $invoice_query->get_result();

if ($invoice = $invoice_result->fetch_assoc()) {
    // Fetch invoice items
    $items_query = $conn->prepare("SELECT * FROM invoice_items WHERE invoice_id = ?");
    $items_query->bind_param("i", $invoice_id);
    $items_query->execute();
    $items_result = $items_query->get_result();
} else {
    die("❌ Invoice not found.");
}
?>

<h2>Invoice #<?php echo $invoice['id']; ?></h2>
<p>Customer: <?php echo $invoice['customer_name']; ?></p>
<p>Date: <?php echo $invoice['invoice_date']; ?></p>
<p>Total: <?php echo $invoice['total_amount']; ?></p>

<h3>Items</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Subtotal</th>
    </tr>
    <?php while ($item = $items_result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $item['product_name']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><?php echo $item['quantity'] * $item['price']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>