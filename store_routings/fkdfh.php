<?php
$db = new mysqli("localhost", "root", "", "batch66");
$data = $db->query("SELECT * FROM customers");

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete']; // cast for safety
    $db->query("DELETE FROM customers WHERE id=$id");
    // reload page to update table instantly
    header("Location: delete.php");
}

$html = "<table border='1' style='font-size:16px; border-collapse:collapse; width:500px; text-align:center;'>";
$html .= "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>";

while ($row = $data->fetch_object()) {
    $html .= "<tr>
                <td>{$row->id}</td>
                <td>{$row->name}</td>
                <td>{$row->phone}</td>
                <td>
                    <a href='delete.php?edit={$row->id}'>Edit</a> | 
                    <a href='delete.php?delete={$row->id}' onclick=\"return confirm('Are you sure?')\">Delete</a>
                </td>
              </tr>";
}
$html .= "</table>";

echo $html;
