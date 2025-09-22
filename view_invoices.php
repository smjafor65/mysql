<?php
session_start();
include("db.config.php");
if (!isset($_SESSION['staff'])) {
    header("Location: login.php");
    exit;
}

$result = $conn->query("SELECT * FROM invoices ORDER BY id DESC");
?>

<h2>All Invoices</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Date</th>
        <th>Total Amount</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['invoice_date']; ?></td>
            <td><?php echo $row['total_amount']; ?></td>
            <td><a href="view_invoice_details.php?id=$row['id'];">View</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>