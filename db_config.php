<?php
 
 define("SERVER",'localhost');
 define("USER",'root');
 define("PASS",'');
 define("DATABASE",'batch67');

 $db=new Mysqli(SERVER, USER, PASS, DATABASE);
//  print_r($db);

$data=$db->query("select * from students");

// print_r($data->fetch_all());

?>

 <table border=" 2px solid black" cellpadding="5" cellspacing="3" width="80%" align="center" bgcolor="#f2f2f2" bordercolor="black">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>result</th>
    </tr>
    <?php
    
    while($row=$data->fetch_assoc()){
        print_r($row);

        echo
        " <tr>
        <th>{$row['id']}</th>
        <th>{$row['name']}</th>
        <th>{$row['result']}</th>
        </tr>";
        
        
    }

    ?>
</table>

