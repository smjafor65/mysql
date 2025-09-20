<?php
$db = new mysqli("localhost", "root", "", "batch66");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = $db->query("delete from customers where id=$id");
}

$data = $db->query("select * from customers");


$html = $html = "<table style='font-size:20px; border:1px solid #0d528aff; border-collapse:collapse; width:500px;'> ";
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
            
            <a href='delete.sql.php?delete={$row->id}'>Delete</a>  
            
            </td>
            
            </tr>";
}
$html .= "</table>";
echo $html;
