<?php
@session_start();
if (!$_SESSION['is_login']){

    // Redirect to another page
    header("Location: login_page.php");
    exit();
    
    // Flush the output buffer
    ob_end_flush();
}


// Check if 'src' parameter is set
if (isset($_GET['src'])) {
    $src = $_GET['src']; // Decode the URL-encoded src
 
} else {
    echo "<p>No image source provided.</p>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Report - Doctor's Vision </title>
    <!-- Required meta tags -->

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.3.1 -->

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exif-js/2.3.0/exif.js"></script>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body {
            background-color: rgb(225, 223, 219);
        }

        h3:hover,
        h4:hover {
            color: red;
            transform: scale(1.05);
        }

        @media only screen and (max-width: 600px) {
            .image-box {
                width: 100%;

            }

            .container h3 {
                font-size: 13px;

            }
        }

        .image-box {
            background-color: transparent;
            width: 100%;
            align-items: center;

        }
    </style>
</head>

<body>
    <main>


        <!-- Menu Section -->
        <?php
        include "nav.php";
         ?>
        <!-- End Menu Section -->
        <!-- End Menu Section  -->
        <div class="container">
            <br>
            <h3 class="fs-lg-3 fw-bold text-dark">Overview of Report</h3>
            <div class="row">
                <div class="pt-3">
                    <div class="row py-3 mb-4 d-flex justify-content-center">
                        <!-- Image upload section -->
                        <div class="col-12 col-lg-3 col-md-4 col-sm-11 me-lg-auto">
                            <div class="card shadow-lg p-3 mb-5 bg-body rounded image-box">
                                <!-- image preview  -->
                                <a href="<?php echo $src;?>" target="_blank"><img src="<?php echo $src;?>"
                                        id="uploadPreview" class="card-img-top" alt="Image Preview" /></a>
                            </div>

                        </div>
                        <!-- End Image upload section -->

                        <!-- Image Information section  -->
                        <div class="shadow-lg p-3 mb-5 bg-body rounded col-12 col-lg-8 col-md-7 col-sm-11">
                            <div>
                                <style>
                                    #output span {
                                        color: rgb(11, 5, 68);
                                    }
                                </style>
                                <div class="ps-2" id="output">

                                    <div class="row">
                                        <div class="col-3">
                                            <p><strong>Name </strong> </p>

                                        </div>
                                        <div class="col-9">
                                            <span id="name"></span>
                                        </div>
                                        <div class="col-3">
                                            <p><strong>Age </strong> </p>
                                        </div>
                                        <div class="col-9">
                                            <span id="age"></span>
                                        </div>
                                        <div class="col-3">
                                            <p><strong>Phone No. </strong></p>

                                        </div>
                                        <div class="col-9">
                                            <span id="phone"></span>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <p><strong> Report Summary -</strong></p>

                                        </div>
                                        <div class="col-11 mx-auto">

                                            <span id="report"></span>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function () {
                                $.getJSON('data.json', function (data) {
                                    data.employees.forEach(function (employee) {
                                        $("#name").text(employee.firstName + " " + employee.lastName);
                                        $("#age").text(employee.age);
                                        $("#phone").text(employee.phone);
                                        $("#report").text(employee.report);
                                    });
                                }).fail(function () {
                                    console.error('Error fetching the JSON data');
                                });
                            });
                        </script>
                        <!-- End Image Informatino section -->
                    </div>
                </div>
            </div>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>


</body>

</html>