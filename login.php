<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <title>Material Dashboard 2 by Creative Tim</title>

    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
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

<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->

                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content mt-0">
        <div class="page-header align-items-start min-vh-100" style="
          background-image: url('img/photo-1497294815431-9365093b7331.webp');
        ">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                        ເຂົ້າສູ່ລະບົບ
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" class="user">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ຊື່ຜູ້ໃຊ້ງານ</label>
                                        <input type="text" id="username" class="form-control" />
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">ລະຫັດຜ່ານ</label>
                                        <input type="password" id="password" class="form-control" />
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
                                            ເຂົ້າສູ່ລະບົບ
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                ©
                                <script>
                                document.write(new Date().getFullYear());
                                </script>
                                , made with <i class="fa fa-heart" aria-hidden="true"></i> by
                                <a href="#" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white" target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white" target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white" target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link pe-0 text-white" target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
    var win = navigator.platform.indexOf("Win") > -1;
    if (win && document.querySelector("#sidenav-scrollbar")) {
        var options = {
            damping: "0.5",
        };
        Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
    }
    </script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-dashboard.min.js?v=3.1.0"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script>
    $(document).ready(function() {
        $(".user").submit((e) => {
            e.preventDefault();
            var username = $("#username").val();
            var password = $("#password").val();
            if (username == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້",
                    confirmButtonText: "ຕົກລົງ",
                });
            } else if (password == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຊື່ລະຫັດຜ່ານ",
                    confirmButtonText: "ຕົກລົງ",
                });
            } else {
                // todo check login Trune
                $.ajax({
                    type: "post",
                    url: "check_userlogin.php",
                    data: {
                        username,
                        password,
                    },

                    success: function(response) {
                        var data = JSON.parse(response);
                        // todo check users password and username
                        if (data >= "1") {
                            $.ajax({
                                type: "post",
                                url: "check_user_status.php",
                                data: {
                                    username,
                                    password,
                                },
                                success: function(response) {
                                    // todo select user passowrd and usernmae
                                    var data = JSON.parse(response);
                                    if (data.us_status == "admin") {
                                        localStorage.setItem("username", data
                                            .us_name);
                                        Swal.fire({
                                            icon: "success",
                                            title: "admin ເຂົ້າສູ່ລະບົບສຳເລັດ",
                                            showConfirmButton: false,
                                            timer: 1500,
                                        });
                                        setTimeout(() => {
                                            window.location =
                                                "admin.php";
                                        }, 1500);
                                    } else {
                                        localStorage.setItem("username", data
                                            .us_name);
                                        Swal.fire({
                                            icon: "success",
                                            title: "user ເຂົ້າສູ່ລະບົບສຳເລັດ",
                                            showConfirmButton: false,
                                            timer: 1500,
                                        });
                                        setTimeout(() => {
                                            window.location =
                                                "users.php";
                                        }, 1500);
                                    }
                                },
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "ລະຫັດຜ່ານ ຫຼຶ ຊື່ຜູ້ໃຊ້ ບໍຖືກຕ້ອງ",
                                confirmButtonText: "ຕົກລົງ",
                            });
                        }
                    },
                });
            }
        });
    });
    </script>
</body>

</html>