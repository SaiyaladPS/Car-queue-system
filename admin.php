<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: 404.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
    <style>
        @font-face {
            font-family: "NotoSansLao";
            src: url("font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("woff2"),
                url("font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("woff"),
                url("font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("truetype");
            /* Add other font properties as needed, e.g., font-weight, font-style */
        }

        * {
            font-family: "NotoSansLao", sans-serif;
        }

        .img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #33FF3F;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar bg-gradient-info sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon p-0 m-0">
                    <img src="img/<?php echo $_SESSION['profile'] ?>" alt="" class="img">
                </div>
                <div class="sidebar-brand-text mx-3">ລະບົບຄິວລົດ</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 bg-white" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="charts.php" target="n">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>ລາຍງານຜົນ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>ແຂວງ</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ກ່ຽວກັບແຂວງ</h6>
                        <a class="collapse-item" href="page/province/form_province.php" target="n">ບັນທືກແຂວງ</a>
                        <a class="collapse-item" href="page/province/select_province.php" target="n">ຂໍ້ມູນແຂວງ</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#district"
                    aria-expanded="true" aria-controls="district">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>ເມືອງ</span>
                </a>
                <div id="district" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ກ່ຽວກັບເມືອງ</h6>
                        <a class="collapse-item" href="page/district/form_district.php" target="n">ບັນທືກເມືອງ</a>
                        <a class="collapse-item" href="page/district/select_district.php" target="n">ຂໍ້ມູນເມືອງ</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#village"
                    aria-expanded="true" aria-controls="village">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>ບ້ານ</span>
                </a>
                <div id="village" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ກ່ຽວກັບບ້ານ</h6>
                        <a class="collapse-item" href="page/village/form_village.php" target="n">ບັນທືກບ້ານ</a>
                        <a class="collapse-item" href="page/village/select_village.php" target="n">ຂໍ້ມູນບ້ານ</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#driving"
                    aria-expanded="true" aria-controls="driving">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>ໂຊເຟີ</span>
                </a>
                <div id="driving" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ກ່ຽວກັບໂຊເຟີ</h6>
                        <a class="collapse-item" href="page/driving/form_driving.php" target="n">ບັນທືກໂຊເຟີ</a>
                        <a class="collapse-item" href="page/driving/select_driving.php" target="n">ຂໍ້ມູນໂຊເຟີ</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cat" aria-expanded="true"
                    aria-controls="cat">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>ລົດຄິວ</span>
                </a>
                <div id="cat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ກ່ຽວກັບລົດຄິວ</h6>
                        <a class="collapse-item" href="page/car/form_car.php" target="n">ບັນທືກລລົດຄິວ</a>
                        <a class="collapse-item" href="page/car/select_car.php" target="n">ຂໍ້ມູນລົດຄິວ</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#timer" aria-expanded="true"
                    aria-controls="timer">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>ໂມງອອກ</span>
                </a>
                <div id="timer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ກ່ຽວກັບໂມງອອກ</h6>
                        <a class="collapse-item" href="page/time/form_time.php" target="n">ບັນທືກໂມງອອກ</a>
                        <a class="collapse-item" href="page/time/select_time.php" target="n">ຂໍ້ມູນໂມງອອກ</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#queue" aria-expanded="true"
                    aria-controls="queue">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>ຄິວ</span>
                </a>
                <div id="queue" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ກ່ຽວກັບຄິວ</h6>
                        <a class="collapse-item" href="page/queue/form_queue.php" target="n">ບັນທືກຄິວ</a>
                        <a class="collapse-item" href="page/queue/select_queue.php" target="n">ຂໍ້ມູນຄິວ</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#destination"
                    aria-expanded="true" aria-controls="destination">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>ປາຍທາງຕົ້ນທາງ</span>
                </a>
                <div id="destination" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ກ່ຽວກັບ</h6>
                        <a class="collapse-item" href="page/destination/form_destination.php"
                            target="n">ບັນທືກຕົ້ນທາງປາຍທາງ</a>
                        <a class="collapse-item" href="page/destination/select_destination.php"
                            target="n">ຂໍ້ມູນຕົ້ນທາງປາຍທາງ</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">ພາຍນອກ</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>ອອກບິນ</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">ຜູ້ໂດຍສານ</h6>
                        <a class="collapse-item" href="page/passengers/form_passengers.php"
                            target="n">ບັນທືກຜູ້ໂດຍສານ</a>
                        <a class="collapse-item" href="page/passengers/select_passengers.php"
                            target="n">ຂໍ້ມູນຜູ້ໂດຍສານ</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">ປີ້</h6>
                        <a class="collapse-item" href="page/user/form_user.php" target="n">ບັນທືກພະນັກງານ</a>
                        <a class="collapse-item" href="page/user/select_user.php" target="n">ຂໍ້ມູນພະນັກງານ</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link bg-danger logout " href="logout.php">ອອກຈາກລະບົບ</a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <div class="btn btn-outline-danger ">
                        <i class="fas fa-calendar-alt"></i>
                        <span id="showtime"></span>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2" />
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">

                            <a href="logout.php" class="btn btn-outline-danger mt-3">ອອກຈາກລະບົບ</a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['username'] ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/<?php echo $_SESSION['profile'] ?>" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <iframe src="charts.php" width="100%" height="700" name="n" style="border: none"></iframe>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
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
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script>
        setInterval(() => {
            // Create a new Date object
            const currentDate = new Date();

            // Get individual components of the date and time
            const year = currentDate.getFullYear();
            const month = ('0' + (currentDate.getMonth() + 1)).slice(-2); // Months are zero-based
            const day = ('0' + currentDate.getDate()).slice(-2);
            const hours = ('0' + currentDate.getHours()).slice(-2);
            const minutes = ('0' + currentDate.getMinutes()).slice(-2);
            const seconds = ('0' + currentDate.getSeconds()).slice(-2);

            // Create a formatted string
            const formattedTime = `ວັນທີ : ${year}-${month}-${day}// ເວລາ : ${hours}:${minutes}:${seconds}`;
            var showtime = document.querySelector("#showtime");
            showtime.innerHTML = formattedTime;
        }, 1000);
    </script>

</body>

</html>