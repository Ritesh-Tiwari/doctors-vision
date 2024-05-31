<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor's Vision | Cloud97</title>
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
        background-image: url("assets/images/pexels-tiana-18128-234272.jpg");
        background-repeat: no-repeat;
        background-position: top;
        background-size: cover;
        height: 99vh;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card shadow-lg rounded" style="background-color: transparent; margin-top: 100px">
                    <div class="card-body">
                        <h5 class="card-title text-center m-3">
                            <b>
                                Doctor's <span class="text-success"> Vision</span>
                            </b>
                        </h5>
                        <div class="text-center my-5">
                            <h5 class="<?php echo $_SESSION['color'];?>"><b>
                                    <?php echo $_SESSION['msg']; ?></b></h5>
                            <br>
                            <p>If you are not redirected automatically, follow this <br> <a href="index.php">link to the
                                    homepage</a>.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    // Redirect after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        window.location.href = 'index.php';
    }, 5000);
    </script>
</body>

</html>