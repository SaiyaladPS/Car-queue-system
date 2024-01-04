<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';

$select_id = $_GET['select_id'];

$sql_select = "SELECT * FROM passengers as p1 INNER JOIN car as p2 ON p1.car_id = p2.car_id INNER JOIN timer ON p1.ti_id = timer.ti_id WHERE p1.pa_id = '" . $select_id . "'";
$query_select = mysqli_query($conn, $sql_select);
$rows_select = mysqli_fetch_assoc($query_select);
$sql = "SELECT * FROM destination ";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SB Admin 2 - Buttons</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
    @font-face {
        font-family: "NotoSansLao";
        src: url("../../font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("woff2"),
            url("../../font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("woff"),
            url("../../font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("truetype");
        /* Add other font properties as needed, e.g., font-weight, font-style */
    }

    body {
        font-family: "NotoSansLao", sans-serif;
    }

    .coutnform {
        transform: translateX(-50%);
        left: 50%;
        position: relative;
        border-radius: 20px;
    }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div class="my-auto">
        <form class=" w-50 h-50 bg-gradient-info text-white px-5 py-5 coutnform rounded-4 mt-4" id="form_district">
            <div class="mb-3">
                <input type="hidden" value="<?php echo $rows_select['pa_id'] ?>" id="pa_id">
                <label for="exampleInputEmail1" class="form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                <input type="text" class="form-control" id="pa_name" value="<?php echo $rows_select['pa_name'] ?>"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ເບີໂທ</label>
                <input type="text" class="form-control" id="pa_tel" value="<?php echo $rows_select['pa_tel'] ?>"
                    aria-describedby="emailHelp">
            </div>
            <div class="input-group mb-3">
                <input type="date" class="form-control dateTo" placeholder="Recipient's username"
                    aria-label="Recipient's username" id="pa_date" aria-describedby="basic-addon2"
                    value="<?php echo $rows_select['pa_date'] ?>">
                <button type="button" class="input-group-text btn btn-success" id="basic-addon2">ເລືອກວັນນີ້</button>
            </div>

            <div class="mb-3">
                <select class="form-select" disabled aria-label="Default select example" id="ti_id">
                    <option value="<?php echo $rows_select['ti_id'] ?>">
                        <?php echo $rows_select['ti_name'] ?>
                    </option>
                </select>
            </div>



            <button type="submit" class="btn btn-primary ">ແກ້ໄຂ້</button>
            <button type="reset" class="btn btn-danger ">ລ້າງ</button>
            <a href="select_passengers.php" class="btn btn-success ">ຂໍ້ມູນ</a>
        </form>
        <div id="Bill"></div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <script src="../../js/sweetalert2.js"></script>

    <script>
    $(document).ready(() => {
        function setToday() {
            // Get the current date in the format "YYYY-MM-DD"
            var currentDate = new Date().toISOString().split('T')[0];

            // Set the date input field value to the current date
            $('.dateTo').val(currentDate);
        }
        $("#basic-addon2").click(() => {
            setToday()
        })

        $('#form_district').submit((e) => {
            e.preventDefault()
            var pa_name = $("#pa_name").val()
            var pa_tel = $("#pa_tel").val()
            var pa_date = $("#pa_date").val()
            var ti_id = $("#ti_id").val()
            var pa_id = $("#pa_id").val()
            if (pa_date == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນວັນທີອອກ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (ti_id == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນໂມງອອກ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else {

                var sendata = {
                    pa_name,
                    pa_tel,
                    ti_id,
                    pa_id
                }

                $.ajax({
                    type: "post",
                    url: "update_passengers.php",
                    data: sendata,
                    success: function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "ແກ້ໄຂ້ຂໍ້ມູນສຳເລັດ",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        setTimeout(() => {
                            window.location = "select_passengers.php"
                        }, 1500);
                    }
                });
            }
        })

    })
    </script>
</body>

</html>