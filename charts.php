<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: 404.php");
}
require "db/connect.php";

$sql_queue = "SELECT * FROM car";
$query_queue = mysqli_query($conn, $sql_queue);
$row_queue = mysqli_num_rows($query_queue);
$sql_user = "SELECT * FROM users";
$query_user = mysqli_query($conn, $sql_user);
$row_user = mysqli_num_rows($query_user);
$sql_car_status = "SELECT * FROM car WHERE car_status = 'Loose'";
$quer_car_status = mysqli_query($conn, $sql_car_status);
$rows_car_status = mysqli_num_rows($quer_car_status);
$sql_car_status1 = "SELECT * FROM car WHERE car_status = 'Full'";
$quer_car_status1 = mysqli_query($conn, $sql_car_status1);
$rows_car_status1 = mysqli_num_rows($quer_car_status1);

// todo ຈຳນວນ ໂຊເຟີ
$sql_driving = "SELECT * FROM `driving`";
$query_driving = mysqli_query($conn, $sql_driving);
$rows_driving = mysqli_num_rows($query_driving);

// todo ຈຳນວນ ໂຊເຟີທີ່ຕໍ່ທັນມີລົດ
$sql_dr_num = "SELECT * FROM driving INNER JOIN car ON driving.dr_id = car.dr_id";
$query_dr_num = mysqli_query($conn, $sql_dr_num);
$rows_dr_num = mysqli_num_rows($query_dr_num);

// todo ຈຳນວນ ໂຊເຟີທີ່ມີລົດ
$car_me = $rows_dr_num;
// todo ຈຳນວນ ໂຊເຟີທີ່ຍັງບໍ່ທັນມີລົດ
$car_not = $rows_driving - $rows_dr_num;

// todo ລົດ
$sql_car_select = "SELECT * FROM car as p1 INNER JOIN queue as p2 ON p1.qu_id = p2.qu_id INNER JOIN driving as p3 ON p1.dr_id = p3.dr_id INNER JOIN timer as p4 ON p1.ti_id = p4.ti_id  ORDER BY p1.car_id DESC";
$query_car_select = mysqli_query($conn, $sql_car_select);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Charts</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />

    <title>Material Dashboard 2 by Creative Tim</title>


    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- CSS Files -->

    <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->

    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: "NotoSansLao";
            src: url("font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("woff2"),
                url("font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("woff"),
                url("font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("truetype");
        }

        * {
            font-family: "NotoSansLao", sans-serif;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <div class="container-fluid pt-4 ">

                    <div class="row">
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card mb-2">
                                <div class="card-header p-3 pt-2 font-weight-bold">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="fas fa-car-side fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize text-success font-weight-bold">
                                            ຈຳນວນລົດຫ່ວາງ</p>
                                        <h4 class="mb-0">
                                            <?php echo $rows_car_status ?>
                                            ຄັນ
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card mb-2">
                                <div class="card-header p-3 pt-2 font-weight-bold">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-danger shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="fas fa-car-side fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize text-danger font-weight-bold">
                                            ຈຳນວນລົດເຕັມ</p>
                                        <h4 class="mb-0">
                                            <?php echo $rows_car_status1 ?>
                                            ຄັນ
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card mb-2">
                                <div class="card-header p-3 pt-2 font-weight-bold">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-primary shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="fas fa-car-side fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize text-primary font-weight-bold">
                                            ຈຳນວນລົດຄິວທັງໝົດ</p>
                                        <h4 class="mb-0">
                                            <?php echo $row_queue ?>
                                            ຄັນ
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card mb-2">
                                <div class="card-header p-3 pt-2 font-weight-bold">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-info shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize text-info font-weight-bold">
                                            ຈຳນວນພະນັກງານທັງໝົດ</p>
                                        <h4 class="mb-0">
                                            <?php echo $row_user ?>
                                            ຄົນ
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card mb-2">
                                <div class="card-header p-3 pt-2 font-weight-bold">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-warning shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize text-warning font-weight-bold">
                                            ຈຳນວນໂຊເຟີ ທັງໝົດ</p>
                                        <h4 class="mb-0">
                                            <?php echo $rows_driving ?>
                                            ຄົນ
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card mb-2">
                                <div class="card-header p-3 pt-2 font-weight-bold">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize text-success font-weight-bold">
                                            ຈຳນວນໂຊເຟີ ທີມີລົດ</p>
                                        <h4 class="mb-0">
                                            <?php echo $car_me ?>
                                            ຄົນ
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card mb-2">
                                <div class="card-header p-3 pt-2 font-weight-bold">
                                    <div
                                        class="icon icon-lg icon-shape bg-gradient-danger shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="text-end pt-1">
                                        <p class="text-sm mb-0 text-capitalize text-danger font-weight-bold">
                                            ຈຳນວນໂຊເຟີ ທີບໍ່ທັນມີລົດ</p>
                                        <h4 class="mb-0">
                                            <?php echo $car_not ?>
                                            ຄົນ
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <h6 class="m-0 font-weight-bold w-100 text-center fs-4 text-success">ຂໍ້ມູນ ລົດ</h6>
                        <div class="card-header py-3">


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ລຳດັບ</th>
                                            <th>ປະເພດລົດ</th>
                                            <th>ເລກທະບຽບ</th>
                                            <th>ສະຖານະ</th>
                                            <th>ໂມງອອກ</th>
                                            <th>ຄິວ</th>
                                            <th>ຈຳນວນຜູ້ໂດຍສານ</th>
                                            <th>ໂຊເຟີ</th>
                                            <th>ດຳເນີນການ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ລຳດັບ</th>
                                            <th>ປະເພດລົດ</th>
                                            <th>ເລກທະບຽບ</th>
                                            <th>ສະຖານະ</th>
                                            <th>ໂມງອອກ</th>
                                            <th>ຄິວ</th>
                                            <th>ຈຳນວນຜູ້ໂດຍສານ</th>
                                            <th>ໂຊເຟີ</th>
                                            <th>ດຳເນີນການ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        $number = 1;
                                        while ($row = mysqli_fetch_assoc($query_car_select)) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $number++ ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['car_name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['car_num'] ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['car_status'] == "Loose") {
                                                        echo "<p class=' text-success '>ວ່າງ</p>";
                                                    } else {
                                                        echo "<p class=' text-danger '>ອອກແລ້ວ</p>";
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['ti_name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['qu_name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['car_qty'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['dr_name'] ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic mixed styles example">
                                                        <?php if ($row['car_status'] == "Loose") { ?>
                                                            <button type="button" class="btn btn-success goout"
                                                                id="<?php echo $row['car_id'] ?>">ອະນຸນັດອອກລົດ</button>
                                                        <?php } else { ?>
                                                            <button type="button" id="<?php echo $row['car_id'] ?>"
                                                                class="btn btn-info goin">ເລິ່ມຕົ້ນ</button>
                                                        <?php } ?>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/sweetalert2.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    <script>
        $(document).ready(function () {
            $(".goout").click((e) => {
                var car_id = e.target.id;
                $(e.target).addClass("d-none"); // Add "d-none" class to the clicked button
                $(e.target).siblings(".goin").removeClass("d-none");
                var button2 = $(e.target).siblings(".goin");
                $.ajax({
                    type: "post",
                    url: "update_car.php",
                    data: {
                        car_id
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "ອະນຸຍາດສຳເລັດ",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        setTimeout(() => {
                            window.location = "charts.php"
                        }, 1500)
                    }
                });
            });

            $(".goin").click((e) => {
                var car_id = e.target.id;
                $(e.target).addClass("d-none"); // Add "d-none" class to the clicked button
                $(e.target).siblings(".goout").removeClass("d-none");
                var button2 = $(e.target).siblings(".goin");
                $.ajax({
                    type: "post",
                    url: "update_car_in.php",
                    data: {
                        car_id
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "ເລິ່ມຕົ້ນສຳເລັດ",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        setTimeout(() => {
                            window.location = "charts.php"
                        }, 1500)
                    }
                });
            });
        })
    </script>

</body>

</html>