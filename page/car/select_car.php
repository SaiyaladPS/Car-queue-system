<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$sql = "SELECT * FROM car as p1 INNER JOIN queue as p2 ON p1.qu_id = p2.qu_id INNER JOIN driving as p3 ON p1.dr_id = p3.dr_id INNER JOIN timer as p4 ON p1.ti_id = p4.ti_id  ORDER BY p1.car_id DESC";
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

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <h6 class="m-0 font-weight-bold w-100 text-center fs-4 text-primary">ຂໍ້ມູນ ລົດ</h6>
            <div class="card-header py-3">

                <a href="form_car.php" class="btn btn-primary ">ເພິ່ມຂໍ້ມູນ</a>
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
                            while ($row = mysqli_fetch_assoc($query)) { ?>
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
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button type="button" class="btn btn-danger delete"
                                                id="<?php echo $row['car_id'] ?>">ລົບ</button>
                                            <a class="btn btn-warning"
                                                href="select_update_car.php?select_id=<?php echo $row['car_id'] ?>">ແກ້ໄຂ້</a>
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
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <script src="../../js/sweetalert2.js"></script>
    <!-- dataTable -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../js/demo/datatables-demo.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(() => {
            $(".delete").click((e) => {
                var car_id = e.target.id
                Swal.fire({
                    title: "ຕ້ອງການລົບຫຼຶບໍ່?",
                    text: "ຖ້າຕ້ອງການກົດທີຢືນຢັນ",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "ຢືນຢັນ",
                    cancelButtonText: "ຍົກເລິກ"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "delete_car.php",
                            data: {
                                car_id
                            },
                            success: function (response) {
                                if (response == 200) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "ລົບຂໍ້ມູນສຳເລັດ",
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });
                                    setTimeout(() => {
                                        window.location =
                                            "select_car.php"
                                    }, 1500);
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: "ບໍ່ສາມາດລົບໄດ້",
                                        text: "ເນືອງຈາກອາດເກີດຂໍ້ຜິດພາດບາງຢ່າງ",
                                        confirmButtonText: "ຕົກລົງ"
                                    });
                                }
                            }
                        });
                    }
                });

            })
        })
    </script>
</body>

</html>