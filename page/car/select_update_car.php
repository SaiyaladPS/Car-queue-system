<?php
require '../../db/connect.php';
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
// todo SELECT UPDATE
$select_id = $_GET['select_id'];

$sql_select = "SELECT * FROM car as p1 INNER JOIN queue as p2 ON p1.qu_id = p2.qu_id INNER JOIN driving as p3 ON p1.dr_id = p3.dr_id INNER JOIN timer as p4 ON p1.ti_id = p4.ti_id WHERE p1.car_id = '" . $select_id . "'";
$query_select = mysqli_query($conn, $sql_select);
$rows_select = mysqli_fetch_assoc($query_select);

$sql = "SELECT * FROM queue";
$query = mysqli_query($conn, $sql);
$sql_dr = "SELECT * FROM driving ";
$query_dr = mysqli_query($conn, $sql_dr);
$sql_time = "SELECT * FROM timer";
$query_time = mysqli_query($conn, $sql_time);
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
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet" />
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
    <div class="mx-auto">
        <form class=" bg-gradient-info w-50 h-50 text-white px-5 py-5 coutnform rounded-4 mt-4" id="form_province">
            <input type="hidden" value="<?php echo $rows_select['car_id'] ?>" id="car_id">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ປະເພດລົດ</label>
                <input type="text" class="form-control" id="car_name" aria-describedby="emailHelp"
                    value="<?php echo $rows_select['car_name'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ເລກທະບຽນ</label>
                <input type="text" class="form-control" id="car_num" aria-describedby="emailHelp"
                    value="<?php echo $rows_select['car_num'] ?>">
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" id="qu_id">
                    <option selected value="<?php echo $rows_select['qu_id'] ?>" hidden>
                        <?php echo $rows_select['qu_name'] ?>
                    </option>
                    <?php while ($rows = mysqli_fetch_assoc($query)) { ?>
                    <option value="<?php echo $rows['qu_id'] ?>">
                        <?php echo $rows['qu_name'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" id="dr_id">
                    <option selected value="<?php echo $rows_select['dr_id'] ?>" hidden>
                        <?php echo $rows_select['dr_name'] ?>
                    </option>
                    <?php while ($rows = mysqli_fetch_assoc($query_dr)) { ?>
                    <option value="<?php echo $rows['dr_id'] ?>">
                        <?php echo $rows['dr_name'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" id="ti_id">
                    <option selected value="<?php echo $rows_select['ti_id'] ?>" hidden>
                        <?php echo $rows_select['ti_name'] ?>
                    </option>
                    <?php while ($rows = mysqli_fetch_assoc($query_time)) { ?>
                    <option value="<?php echo $rows['ti_id'] ?>">
                        <?php echo $rows['ti_name'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">ໜາຍເຫດ</label>
                <input type="text" class="form-control" id="car_remak" value="<?php echo $rows_select['car_remak'] ?>">
            </div>
            <button type="submit" class="btn btn-primary ">ບັນທືກ</button>
            <button type="reset" class="btn btn-danger ">ລ້າງ</button>
            <a href="select_car.php" class="btn btn-success ">ຂໍ້ມູນ</a>
        </form>
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
        $('#form_province').submit((e) => {
            e.preventDefault()
            var car_name = $("#car_name").val()
            var car_remak = $("#car_remak").val()
            var car_num = $("#car_num").val()
            var qu_id = $("#qu_id").val()
            var dr_id = $("#dr_id").val()
            var ti_id = $('#ti_id').val()
            var car_id = $("#car_id").val()

            if (car_name == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນປະເພດລົດ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (car_num == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນລະບຽບລົດ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (qu_id == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາເລືອກຄິວປະຈຳ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (dr_id == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາເລືອກໂຊເຟິ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (ti_id == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາເລືອກເວລາອອກ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else {
                var sendata = {
                    car_name,
                    car_num,
                    car_remak,
                    qu_id,
                    dr_id,
                    ti_id,
                    car_id
                }
                $.ajax({
                    type: "post",
                    url: "update_car.php",
                    data: sendata,
                    success: function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "ແກ້ໄຂ້ຂໍ້ມູນສຳເລັດ",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        setTimeout(() => {
                            window.location =
                                "select_car.php"
                        }, 1500);
                    }
                });
            }
        })
    })
    </script>
</body>

</html>