<?php
session_start();
include("db.config.php");
if (!isset($_SESSION['staff'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['submit_invoice'])) {
    $customer_name = $_POST['customer_name'];
    $invoice_date = $_POST['invoice_date'];
    $products = $_POST['product'];
    $quantities = $_POST['quantity'];
    $prices = $_POST['price'];

    $total = 0;
    foreach ($quantities as $key => $qty) {
        $total += $qty * $prices[$key];
    }

    // Insert invoice
    $stmt = $conn->prepare("INSERT INTO invoices (customer_name, invoice_date, total_amount) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $customer_name, $invoice_date, $total);
    $stmt->execute();
    $invoice_id = $stmt->insert_id;

    // Insert items
    $stmt_item = $conn->prepare("INSERT INTO invoice_items (invoice_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
    foreach ($products as $key => $product) {
        $qty = $quantities[$key];
        $price = $prices[$key];
        $stmt_item->bind_param("isid", $invoice_id, $product, $qty, $price);
        $stmt_item->execute();
    }

    $success = "Invoice created successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Invoice</title>
</head>
<body>
<h2>Add Invoice</h2>
<?php if(!empty($success)) echo "<p style='color:green;'>$success</p>"; ?>
<form method="post">
    Customer Name: <input type="text" name="customer_name" required><br>
    Invoice Date: <input type="date" name="invoice_date" required><br><br>

    <h3>Items</h3>
    <div id="items">
        <div>
            Product: <input type="text" name="product[]" required>
            Quantity: <input type="number" name="quantity[]" required>
            Price: <input type="number" step="0.01" name="price[]" required>
        </div>
    </div>
    <button type="button" onclick="addItem()">Add More Item</button><br><br>

    <button type="submit" name="submit_invoice">Create Invoice</button>
</form>

<script>
function addItem() {
    let div = document.createElement('div');
    div.innerHTML = 'Product: <input type="text" name="product[]" required> Quantity: <input type="number" name="quantity[]" required> Price: <input type="number" step="0.01" name="price[]" required>';
    document.getElementById('items').appendChild(div);
}
</script>
</body>
</html>
