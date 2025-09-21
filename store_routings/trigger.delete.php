<style>
    .html {
        margin: 10px 20px;
        width: 20%;

    }

    .html,
    tr,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }
</style>



<?php
$db = new mysqli("localhost", "root", "", "batch66");



$data = $db->query("select * from customers");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = $db->query("delete from customers where id=$id");
}

echo "<h1>customer table</h1>";
$html = $html = "<table class='html'> ";
$html .= "<tr>
            <th>id</th>
            <th>name</th>
            <th>phone</th>
            <th>action</th>
            </tr>";
while ($row = $data->fetch_object()) {
    $html .= "<tr>
            <td>{$row->id}</td>
           <td>{$row->name}</td>
            <td>{$row->phone}</td>
            <td>
            
            <a href='trigger.delete.php?delete={$row->id}'>Delete</a>  
            
            </td>
            
            </tr>";
}
$html .= "</table>";
echo $html;


echo "<h1>order  table</h1>";
$data = $db->query("select * from orders");

$html = $html = "<table class='html'> ";
$html .= "<tr>
            <th>id</th>
            <th>order_date</th>
            <th>amount</th>
            <th>customer_id</th>
            </tr>";
while ($row = $data->fetch_object()) {
    $html .= "<tr>
            <td>{$row->id}</td>
           <td>{$row->order_data}</td>
            <td>{$row->amount}</td>
            <td>{$row->customer_id}</td>
            </tr>";
}
$html .= "</table>";
echo $html;

?>