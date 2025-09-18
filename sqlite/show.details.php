<?php
include_once("db.config.php");
include_once("sqlite.class.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $result = new Patients("", $name, $age, $mobile);
    $result = $result->save();
    if ($result) {
        echo $result;
        unset($_POST['name']);
        unset($_POST['age']);
        unset($_POST['mobile']);
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    Patients::delete($id);
}

if (isset($_POST['submit_btn'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $update = new Patients($id, $name, $age, $mobile);
    $update = $update->update();
    if ($update) {
        // echo $update;
        echo "Updated";
        unset($_POST['id']);
        unset($_POST['name']);
        unset($_POST['age']);
        unset($_POST['mobile']);
    }
}

$patient = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $patient = Patients::search($id);

    //    print_r( $patient);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f9f9f9;
        }

        form {
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            width: 300px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: inline;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 10px;
            padding: 8px 14px;
            border: none;
            border-radius: 4px;
            background: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #45a049;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            background: #fff;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>

</head>

<body>


    <?php
    if (is_null($patient)) {
    ?>
        <div>
            <h1>Data Table</h1>
            <form action="" method="post">
                <label for="">Name:
                    <input type="text" name="name">
                </label><br>
                <label for="">Age:
                    <input type="number" name="age">
                </label><br>
                <label for="">Mobile:
                    <input type="text" name="mobile">
                </label><br>
                <input type="submit" name="submit">

            </form>
        </div>
    <?php
    } else {
    ?>
        <div>
            <h1>Update Table</h1>
            <form action="" method="post">
                <label for="">Id:
                    <input type="number" name="id" value="<?php echo $patient->id ?? ''; ?>"> </label><br>
                <label for="">Name:
                    <input type="text" name="name" value="<?php echo $patient->name ?? ''; ?>">
                </label><br>
                <label for="">Age:
                    <input type="number" name="age" value="<?php echo $patient->age ?? ''; ?>">
                </label><br>
                <label for="">Mobile:
                    <input type="text" name="mobile" value="<?php echo $patient->mobile ?? ''; ?>">
                </label><br>
                <label for="">
                    <input type="submit" name="submit_btn" value="Update">
                    <a href="show.details.php" style="margin-top: 10px;
                    padding: 8px 20px;
                    border: none;
                    border-radius: 4px;
                    background: #4CAF50;
                    color: #fff;
                    cursor: pointer;
                    text-decoration: none; ">
                        New Patient</a>
                </label>

            </form>
        </div>
    <?php
    }
    ?>

    <?php echo Patients::getAll(); ?>
</body>

</html>