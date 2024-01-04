<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
// todo SELECT UPDATE
$select_id = $_GET['select_id'];

$sql_select = "SELECT * FROM timer WHERE ti_id = '" . $select_id . "'";
$query_select = mysqli_query($conn, $sql_select);
$rows_select = mysqli_fetch_assoc($query_select);

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
        <form class=" w-50 h-50 bg-gradient-info text-white px-5 py-5 coutnform rounded-4 mt-4" id="form_province">
            <input type="hidden" value="<?php echo $rows_select['ti_id'] ?>" id="ti_id">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ໂມງລົດອອກ</label>
                <input type="time" class="form-control" id="ti_name" value="<?php echo $rows_select['ti_name'] ?>"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">ໜາຍເຫດ</label>
                <input type="text" class="form-control" value="<?php echo $rows_select['ti_remak'] ?>" id="ti_remak">
            </div>
            <button type="submit" class="btn btn-primary ">ບັນທືກ</button>
            <button type="reset" class="btn btn-danger ">ລ້າງ</button>
            <a href="select_time.php" class="btn btn-success ">ຂໍ້ມູນ</a>
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
                var ti_name = $("#ti_name").val()
                var ti_remak = $("#ti_remak").val()
                var ti_id = $("#ti_id").val()

                if (ti_name == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນຊື່ແຂວງ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else {
                    var sendata = {
                        ti_name,
                        ti_remak,
                        ti_id
                    }
                    // chekc data
                    $.ajax({
                        type: "post",
                        url: "check_time.php",
                        data: {
                            ti_name
                        },
                        success: function (response) {

                            var data = JSON.parse(response);
                            if (data > 0) {
                                Swal.fire({
                                    icon: "warning",
                                    title: "ທ່ານມີຂໍ້ມູນນີ້ແລ້ວ",
                                    confirmButtonText: "ຕົກລົງ"
                                });
                            } else {
                                $.ajax({
                                    type: "post",
                                    url: "update_time.php",
                                    data: sendata,
                                    success: function (response) {
                                        Swal.fire({
                                            icon: "success",
                                            title: "ແກ້ໄຂ້ຂໍ້ມູນສຳເລັດ",
                                            showConfirmButton: false,
                                            timer: 1500,
                                        });
                                        setTimeout(() => {
                                            window.location =
                                                "select_time.php"
                                        }, 1500);
                                    }
                                });
                            }
                        }
                    });
                }
            })
        })
    </script>
</body>

</html>