<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';

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

    .profile-container {
        text-align: center;
    }

    .profile-picture {
        position: relative;
        display: inline-block;
    }

    .img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #007bff;
    }

    input[type="file"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .label {
        display: block;
        margin-top: 10px;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
    }

    .label:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div class="my-auto">
        <form class=" w-50 h-50 bg-gradient-info text-white px-5 py-5 coutnform rounded-4 mt-4" id="form_queue">
            <div class="row">
                <div class="profile-container">
                    <div class="profile-picture">
                        <img src="../../img/icon.png" class="img" alt="Default Avatar" id="preview">
                        <input class="input" type="file" id="profilePicture" accept="image/*"
                            onchange="previewImage(this)">
                        <label class="label" for="profilePicture">ຮູບພະນັກງານ</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                        <input type="text" class="form-control" id="us_name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ຊື່ ຜູ້ນຳໃຊ້</label>
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ເດືອນ/ວັນ/ປີ ເກີດ</label>
                        <input type="date" class="form-control" id="us_dob" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" id="pro_id">
                            <option selected value="" hidden>ເລືອກແຂວງ</option>
                            <?php while ($rows = mysqli_fetch_assoc($query_pro)) { ?>
                            <option value="<?php echo $rows['pro_id'] ?>">
                                <?php echo $rows['pro_name'] ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" id="us_status">
                            <option selected value="" hidden>ສະຖານະ</option>
                            <option value="admin">ຜູ້ບໍລິຫານ</option>
                            <option value="user">ພະນັກງານ</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">ເລືອກເພດ</label>
                        <div class=" form-control ">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="Male">
                                <label class="form-check-label" for="inlineRadio1">ຊາຍ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="Girl">
                                <label class="form-check-label" for="inlineRadio2">ຍິງ</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ລະຫັດຜ່ານ</label>
                        <input type="password" class="form-control" id="password" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ເບີໂທ</label>
                        <input type="number" class="form-control" id="us_tel" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" id="dis_id">
                            <option selected value="" hidden>ເລືອກເມືອງ</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" id="vi_id">
                            <option selected value="" hidden>ເລືອກເມືອງ</option>

                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">ບັນທືກ</button>
            <button type="reset" class="btn btn-danger ">ລ້າງ</button>
            <a href="select_user.php" class="btn btn-success ">ຂໍ້ມູນ</a>
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

            var us_gander = $('input[name="inlineRadioOptions"]:checked').val();
            e.preventDefault()
            var us_name = $("#us_name").val()
            var us_dob = $("#us_dob").val()
            var pro_id = $("#pro_id").val()
            var us_status = $("#us_status").val()
            var us_tel = $("#us_tel").val()
            var dis_id = $("#dis_id").val()
            var vi_id = $("#vi_id").val()
            var username = $("#username").val()
            var password = $("#password").val()
            var img = $("#profilePicture").val()

            if (img == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຮູບພາບ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (us_name == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (us_dob == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນວັນເດືອນປີເກີດ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (username == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຊື່ຜູ້ນຳໃຊ້",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (password == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນລະຫັດຜ່ານໃຫມ່",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (us_gander == "" || us_gander == undefined) {
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
            } else if (us_tel == "") {
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
            } else if (us_status == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາເລືອກສະຖານະ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else {
                var fileInputId = "profilePicture";
                var formData = new FormData();
                formData.append("fileInputId", fileInputId);
                formData.append("img", $("#" + fileInputId)[0].files[0]);
                formData.append("us_name", $("#us_name").val());
                formData.append("us_dob", $("#us_dob").val());
                formData.append("pro_id", $("#pro_id").val());
                formData.append("us_status", $("#us_status").val());
                formData.append("us_tel", $("#us_tel").val());
                formData.append("dis_id", $("#dis_id").val());
                formData.append("vi_id", $("#vi_id").val());
                formData.append("username", $("#username").val());
                formData.append("password", $("#password").val());
                formData.append("us_gander", us_gander);
                // chekc data
                $.ajax({
                    type: "post",
                    url: "check_user.php",
                    data: {
                        username,
                        password
                    },
                    success: function(response) {

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
                                url: "insert_user.php",
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    if (response === "1") {
                                        Swal.fire({
                                            icon: "success",
                                            title: "ບັນທືກຂໍ້ມູນສຳເລັດ",
                                            showConfirmButton: false,
                                            timer: 1500,
                                        });
                                        setTimeout(() => {
                                            window.location =
                                                "select_user.php"
                                        }, 1500);
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            text: `${response}`,
                                            confirmButtonText: "ຕົກລົງ"

                                        });
                                    }
                                }
                            });
                        }
                    }
                });
            }
        })
    })
    </script>
    <script>
    function previewImage(input) {
        var preview = document.getElementById('preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "default-avatar.png"; // Display default image if no file selected
        }
    }
    </script>
</body>

</html>