<!-- customer table

create table customers (
id int auto increment primary key,
name varchar(50) not null,
phone int not null
);

orders table  -->

<!-- create table orders (
id int auto increment primary key,
order_data timestamp,
amount int,
customer_id int
); -->

<!-- insert data  -->
<!-- 
INSERT INTO `orders` (`id`, `order_data`, `amount`, `customer_id`) VALUES (NULL, current_timestamp(), '10000', '5'),
(NULL, current_timestamp(), '15000', '3'),
(NULL, current_timestamp(), '12000', '3'),
(NULL, current_timestamp(), '13000', '1'),
(NULL, current_timestamp(), '18000', '4'),
(NULL, current_timestamp(), '17000', '2'),
(NULL, current_timestamp(), '16000', '1'),
(NULL, current_timestamp(), '15000', '3'),
(NULL, current_timestamp(), '11000', '5'),
(NULL, current_timestamp(), '9000', '1'); -->

<!-- insert data using procedure  -->

<!-- delimiter $$ 

create procedure insert_data(in id int, in name varchar(20),in phone varchar(20))
begin 
insert into customers (id, name, phone) values(id, name, phone);
end $$
delimiter ; -->

<!-- delete using trigger  -->

<!-- delimiter $$
create trigger delete_data
after delete on customers
for each row
begin
delete from orders where customer_id=old.id;
end $$
delimiter ; -->

<!-- creaiting view   -->

<!-- create view data_table as
select * from orders where amount>12000; -->




















<?php


$db = new mysqli("localhost", "root", "", "batch66");
// $insert=("call insert_data(?,?,?)");




if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $db->query("call insert_data(null,'{$name}',{$phone})");
}

$data = $db->query("select * from data_table");
$html = "<table style='font-size:12px; border:1px solid #333; border-collapse:collapse; width:300px;'> ";
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
$html .= "</table> <br> <br> <br> <br> <br>";
echo $html;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="">Name:
            <input type="text" name="name">
        </label><br>
        <label for="">Phone:
            <input type="text" name="phone">
        </label><br>
        <input type="submit" name="submit">
    </form>
</body>

</html>