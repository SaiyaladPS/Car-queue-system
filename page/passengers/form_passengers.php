<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
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
                <label for="exampleInputEmail1" class="form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                <input type="text" class="form-control" id="pa_name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ເບີໂທ</label>
                <input type="text" class="form-control" id="pa_tel" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" id="des_out">
                    <option selected value="" hidden>ສະຖານີ</option>
                    <?php while ($rows = mysqli_fetch_assoc($query)) { ?>
                    <option value="<?php echo $rows['des_in'] . "," . $rows['des_id'] . "," . $rows['des_out'] ?>">
                        <?php echo $rows['des_in'] . " - " . $rows['des_out'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" id="des_in">

                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ລາຄາ</label>
                <input type="text" class="form-control" id="des_price" aria-describedby="emailHelp">
            </div>
            <div class="input-group mb-3">
                <input type="date" class="form-control dateTo" placeholder="Recipient's username"
                    aria-label="Recipient's username" id="pa_date" aria-describedby="basic-addon2">
                <button type="button" class="input-group-text btn btn-success" id="basic-addon2">ເລືອກວັນນີ້</button>
            </div>

            <div class="mb-3">
                <select class="form-select" disabled aria-label="Default select example" id="ti_id">

                </select>
            </div>



            <button type="submit" class="btn btn-primary ">ອອກປີ້</button>
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
        $("#des_out").change((e) => {
            $("#des_in").empty()

            var inputArryal = e.target.value
            var numberArray = inputArryal.split(',')
            var des_in = numberArray[0];
            $.ajax({
                type: "post",
                url: "select_car.php",
                data: {
                    des_in
                },
                success: function(response) {
                    var data = JSON.parse(response)
                    $.each(data, function(indexInArray, valueOfElement) {
                        $("#des_in").append(`
                            <option selected value="" hidden>ເລືອກອອກລົດ</option>
                        <option value="${valueOfElement.car_id}">${valueOfElement.car_name} / ທະບຽນ ${valueOfElement.car_num}</option>
                            `)
                    });
                }
            });


            var des_id = numberArray[1]

            $.ajax({
                type: "post",
                url: "select_des_price.php",
                data: {
                    des_id
                },
                success: function(response) {
                    var data = JSON.parse(response);

                    $("#des_price").val(formatNumber(data.des_price))
                }
            });

            $("#des_in").change((e) => {
                $('#ti_id').empty()
                var car_id = e.target.value
                $.ajax({
                    type: "post",
                    url: "select_car_time.php",
                    data: {
                        car_id
                    },

                    success: function(response) {
                        var data = JSON.parse(response)
                        $('#ti_id').append(`
                        <option value="${data.ti_id}">${data.ti_name}</option>
                        `)
                    }
                });
            })

            function formatNumber(number) {
                // Convert the number to a string
                var numberString = number.toString();

                // Split the string into integer and decimal parts
                var parts = numberString.split('.');
                var integerPart = parts[0];
                var decimalPart = parts.length > 1 ? '.' + parts[1] : '';

                // Add commas to the integer part
                var formattedInteger = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

                // Concatenate the formatted integer part with the decimal part
                var formattedNumber = formattedInteger + decimalPart;

                return formattedNumber;
            }
        })
        $('#form_district').submit((e) => {
            e.preventDefault()
            var pa_name = $("#pa_name").val()
            var pa_tel = $("#pa_tel").val()
            var des_out = $("#des_out").val()
            var car_id = $("#des_in").val()
            var des_price = $("#des_price").val()
            var pa_date = $("#pa_date").val()
            var ti_id = $("#ti_id").val()
            if (pa_name == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (pa_tel == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນເບີໂທ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (des_out == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາເລຶອກສະຖານີ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (car_id == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາເລຶອກລົດອອກ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (des_price == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນລາຄາ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (pa_date == "") {
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
                var numberArray = des_out.split(',')
                var pa_pass = numberArray[0] + "-" + numberArray[2];
                var pa_price = formatNumberRemov(des_price)
                var sendata = {
                    pa_name,
                    pa_tel,
                    pa_pass,
                    car_id,
                    pa_price,
                    pa_date,
                    ti_id,
                }

                $.ajax({
                    type: "post",
                    url: "insert_passengers.php",
                    data: sendata,
                    success: function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "ບັນທືກຂໍ້ມູນສຳເລັດ",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        setTimeout(() => {
                            window.location = "select_passengers.php"
                            // Open a new window with the response HTML
                            var printWindow = window.open("", "_blank");
                            printWindow.document.write(response);
                            printWindow.document.close();

                            // Wait for the content to be fully loaded before printing
                            printWindow.onload = function() {
                                // Print the content
                                printWindow.print();
                            };
                        }, 1500);
                    }
                });
            }
        })

        function formatNumberRemov(numberString) {
            // Remove commas from the string representation of the number
            var stringWithoutCommas = numberString.replace(/,/g, '');

            return stringWithoutCommas;
        }
    })
    </script>
</body>

</html>