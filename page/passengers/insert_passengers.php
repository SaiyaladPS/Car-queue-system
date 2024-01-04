<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
date_default_timezone_set('Asia/Bangkok');
require "../../db/connect.php";
// Get the current date and time
$currentDateTime = date('d/m/y H:i:s');
$pa_name = $_POST['pa_name'];
$pa_tel = $_POST['pa_tel'];
$pa_price = $_POST['pa_price'];
$pa_date = $_POST['pa_date'];
$pa_pass = $_POST['pa_pass'];
$car_id = $_POST['car_id'];
$ti_id = $_POST['ti_id'];

$sql = "INSERT INTO passengers(pa_name, pa_tel, pa_price, pa_date, pa_pass, car_id, ti_id) 
VALUES ('" . $pa_name . "','" . $pa_tel . "','" . $pa_price . "','" . $pa_date . "','" . $pa_pass . "','" . $car_id . "','" . $ti_id . "')";
$query = mysqli_query($conn, $sql);
if ($query) {
    $update = "UPDATE car SET car_qty = car_qty+1 WHERE car_id = '" . $car_id . "' ";
    $query_upate = mysqli_query($conn, $update);
}
$sql_car = "SELECT * FROM car WHERE car_id = '" . $car_id . "'";
$query_car = mysqli_query($conn, $sql_car);
$rows_car = mysqli_fetch_assoc($query_car);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    @media print {
        .offcanvas {
            display: none;
        }

        .row {
            display: none;
        }

        #Bill {
            display: block;
        }
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .bill {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .bill-header {
        text-align: center;
    }

    .bill-details {
        margin-top: 20px;
    }

    .bill-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .bill-table th,
    .bill-table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    .bill-table thead {
        background-color: #f2f2f2;
    }

    .bill-table tfoot {
        font-weight: bold;
    }
</style>

<body>
    <div class="bill">
        <div class="bill-header">
            <h1>Invoice</h1>
            <p>ວັນທີ:
                <?php echo $currentDateTime ?>
            </p>
        </div>
        <div class="bill-details">
            <p><strong>ອອກບິນໂດຍ:
                    <?php echo $_SESSION['username'] ?>
                </strong>
            </p>
            <p><strong>ໂທ:
                    <?php echo $pa_tel ?>
                </strong>

            </p>
        </div>
        <table class="bill-table">
            <thead>
                <tr>
                    <th>ຜູ້ໂດຍສານ</th>
                    <th>ທະບຽນລົດ</th>
                    <th>ຈຸດໜາຍ</th>
                    <th>ຈຳນວນ</th>
                    <th>ລາຄາ</th>
                    <th>ລວມ</th>
                </tr>
            </thead>
            <tbody>
                <td>
                    <?php echo $pa_name ?>
                </td>
                <td>
                    <?php echo $rows_car['car_num'] ?>
                </td>
                <td>
                    <?php echo $pa_pass ?>
                </td>
                <td>
                    1
                </td>
                <td>
                    <?php echo number_format($pa_price) ?> ກີບ
                </td>
                <td>
                    <?php echo number_format($pa_price) ?> ກີບ
                </td>
            </tbody>
            <tfoot>

                <tr>
                    <td colspan="5"><strong>Total</strong></td>
                    <td><strong>
                            <?php echo number_format($pa_price) ?> ກີບ
                        </strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script>

    </script>
</body>

</html>