<?php
session_start();
require '../../db/connect.php';
if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
// todo SELECT UPDATE
$select_id = $_GET['select_id'];
$sql_select_destination = "SELECT * FROM destination WHERE des_id = '" . $select_id . "' ";
$query_select = mysqli_query($conn, $sql_select_destination);
$rows_select = mysqli_fetch_assoc($query_select);

$sql = "SELECT * FROM queue";
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
            <input type="hidden" id="des_id" value="<?php echo $rows_select['des_id'] ?>">
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" id="des_out">
                    <option selected value="<?php echo $rows_select['des_in'] ?>" hidden>
                        <?php echo $rows_select['des_in'] ?>
                    </option>
                    <?php while ($rows = mysqli_fetch_assoc($query)) { ?>
                        <option value="<?php echo $rows['qu_name'] ?>">
                            <?php echo $rows['qu_name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" id="des_in">
                    <option selected hidden value="<?php echo $rows_select['des_out'] ?>">
                        <?php echo $rows_select['des_out'] ?>
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ລາຄາ</label>
                <input type="text" class="form-control" value="<?php echo $rows_select['des_price'] ?>" id="des_price"
                    aria-describedby="emailHelp">
            </div>

            <button type="submit" class="btn btn-primary ">ບັນທືກ</button>
            <button type="reset" class="btn btn-danger ">ລ້າງ</button>
            <a href="select_destination.php" class="btn btn-success ">ຂໍ້ມູນ</a>
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
            $("#des_out").change((e) => {
                $("#des_in").empty()
                var qu_id = e.target.value;
                $.ajax({
                    type: "post",
                    url: "select_des_in.php",
                    data: {
                        qu_id
                    },
                    success: function (response) {
                        var data = JSON.parse(response)
                        $.each(data, function (indexInArray, valueOfElement) {
                            $("#des_in").append(`
                            <option selected value="" hidden>ຕົ້ນທາງ</option>
                        <option value="${valueOfElement.qu_name}">${valueOfElement.qu_name}</option>
                            `)
                        });
                    }
                });
            })
            $('#form_district').submit((e) => {
                e.preventDefault()
                var des_out = $("#des_out").val()
                var des_in = $("#des_in").val()
                var des_price = $("#des_price").val()
                var des_id = $("#des_id").val()
                if (des_out == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາເລືອກຕົ້ນທາງ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (des_in == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາເລືອກປາຍທາງ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (des_price == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນຈຳນວນເງິນ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else {
                    var sendata = {
                        des_in,
                        des_out,
                        des_price,
                        des_id
                    }

                    $.ajax({
                        type: "post",
                        url: "update_destination.php",
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
                                    "select_destination.php"
                            }, 1500);
                        }
                    });
                }
            })
        })
    </script>
</body>

</html>