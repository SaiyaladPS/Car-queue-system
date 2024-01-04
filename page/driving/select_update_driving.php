<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';

$select_id = $_GET['select_id'];

$sql_select = "SELECT * FROM driving as p1 INNER JOIN queue as p2 ON p1.qu_id = p2.qu_id INNER JOIN province as p3 ON p1.pro_id = p3.pro_id INNER JOIN district as p4 ON p1.dis_id = p4.dis_id INNER JOIN village as p5 ON p1.vi_id = p5.vi_id WHERE dr_id = '" . $select_id . "'";
$query_select = mysqli_query($conn, $sql_select);
$rows_select = mysqli_fetch_assoc($query_select);

$sql_pro = "SELECT * FROM province";
$query_pro = mysqli_query($conn, $sql_pro);

$sql_qu = "SELECT * FROM queue";
$query_qu = mysqli_query($conn, $sql_qu);
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
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
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

    .coutomcheck {

        transform: translateY(-50%);
        top: 50%;
        position: relative;
    }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div class="my-auto">
        <form class=" w-50 h-50 bg-gradient-info text-white px-5 py-5 coutnform rounded-4 mt-4" id="form_queue">
            <div class="row">
                <input type="hidden" value="<?php echo $rows_select['dr_id'] ?>" id="dr_id">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                        <input type="text" class="form-control" id="dr_name"
                            value="<?php echo $rows_select['dr_name'] ?>" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ເດືອນ/ວັນ/ປີ</label>
                        <input type="date" class="form-control" id="dr_dob" value="<?php echo $rows_select['dr_dob'] ?>"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" id="pro_id">
                            <option selected value="<?php echo $rows_select['pro_id'] ?>" hidden>
                                <?php echo $rows_select['pro_name'] ?>
                            </option>
                            <?php while ($rows = mysqli_fetch_assoc($query_pro)) { ?>
                            <option value="<?php echo $rows['pro_id'] ?>">
                                <?php echo $rows['pro_name'] ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" id="qu_id">
                            <option selected value="<?php echo $rows_select['qu_id'] ?>" hidden>
                                <?php echo $rows_select['qu_name'] ?>
                            </option>
                            <?php while ($rows = mysqli_fetch_assoc($query_qu)) { ?>
                            <option value="<?php echo $rows['qu_id'] ?>">
                                <?php echo $rows['qu_name'] ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">ເລືອກເພດ</label>
                        <div class=" form-control ">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" <?php if ($rows_select['dr_gander'] == "Male") { ?>
                                    checked<?php } ?> type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="Male">
                                <label class="form-check-label" for="inlineRadio1">ຊາຍ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" <?php if ($rows_select['dr_gander'] == "Girl") { ?>
                                    checked<?php } ?> type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="Girl">
                                <label class="form-check-label" for="inlineRadio2">ຍິງ</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ເບີໂທ</label>
                        <input type="number" class="form-control" value="<?php echo $rows_select['dr_tel'] ?>"
                            id="dr_tel" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" id="dis_id">
                            <option selected value="<?php echo $rows_select['dis_id'] ?>" hidden>
                                <?php echo $rows_select['dis_name'] ?>
                            </option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" id="vi_id">
                            <option selected value="<?php echo $rows_select['vi_id'] ?>" hidden>
                                <?php echo $rows_select['vi_name'] ?>
                            </option>

                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">ບັນທືກ</button>
            <button type="reset" class="btn btn-danger ">ລ້າງ</button>
            <a href="select_driving.php" class="btn btn-success ">ຂໍ້ມູນ</a>
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

        $("#pro_id").change((e) => {
            var pro_id = e.target.value
            $('#dis_id').empty()
            $("#vi_id").empty()
            $.ajax({
                type: "post",
                url: "select_dis.php",
                data: {
                    "pro_id": pro_id
                },
                success: function(response) {
                    var data = JSON.parse(response)
                    $.each(data, function(indexInArray, valueOfElement) {
                        $('#dis_id').append(`
                            <option selected value="" hidden>ເລືອກເມືອງ</option>
                            <option value="${valueOfElement.dis_id}" >${valueOfElement.dis_name}</option>
                            `)
                    });
                }
            });
        })


        $("#dis_id").change((e) => {

            $("#vi_id").empty()
            var dis_id = e.target.value
            $.ajax({
                type: "post",
                url: "select_vi.php",
                data: {
                    "dis_id": dis_id
                },

                success: function(response) {
                    var data = JSON.parse(response);
                    $.each(data, function(indexInArray,
                        valueOfElement) {
                        $('#vi_id').append(`
                            <option selected value="" hidden>ເລືອກບ້ານ</option>
                            <option value="${valueOfElement.vi_id}" >${valueOfElement.vi_name}</option>
                            `)
                    });
                }
            });
        })


        $('#form_queue').submit((e) => {

            var dr_gander = $('input[name="inlineRadioOptions"]:checked').val();
            e.preventDefault()
            var dr_name = $("#dr_name").val()
            var dr_dob = $("#dr_dob").val()
            var pro_id = $("#pro_id").val()
            var qu_id = $("#qu_id").val()
            var dr_tel = $("#dr_tel").val()
            var dis_id = $("#dis_id").val()
            var vi_id = $("#vi_id").val()
            var dr_id = $("#dr_id").val()


            if (dr_name == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (dr_dob == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນວັນເດືອນປີເກີດ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (dr_gander == "" || dr_gander == undefined) {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາເລືອກເພດ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (pro_id == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາເລືອກແຂວງ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (dr_tel == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນເບີໂທ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (dis_id == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນເລືອກເມືອງ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (vi_id == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາເລືອກບ້ານ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (qu_id == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາເລືອກຄິວ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else {
                var sendata = {
                    dr_name,
                    dr_gander,
                    dr_dob,
                    pro_id,
                    qu_id,
                    dr_tel,
                    dis_id,
                    vi_id,
                    dr_id
                }
                $.ajax({
                    type: "post",
                    url: "update_driving.php",
                    data: sendata,
                    success: function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "ແກ້ໄຂຂໍ້ມູນສຳເລັດ",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        setTimeout(() => {
                            window.location =
                                "select_driving.php"
                        }, 1500);
                    }
                });
            }
        })
    })
    </script>
</body>

</html>