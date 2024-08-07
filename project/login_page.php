<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Doctor's Vision</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.1 -->

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exif-js/2.3.0/exif.js"></script>

    <link rel="stylesheet" href="assets/css/style.css" />

    <style>
    body {
        background-image: url("assets/images/login-background.jpg");
        background-repeat: no-repeat;
        background-position: top;
        background-size: cover;
        height: 100vh;
    }
    </style>
</head>

<body>
    <!-- form container -->
    <div class="container">
        <div class="row">
            <div class="col-11 col-md-6 col-lg-6 col-sm-6 mx-auto">
                <div class="text-center pt-5 pb-4">
                    <h2> <b>Doctor's<span class="text-success"><b> Vision</b></span></b>
                        <hr>
                    </h2>
                </div>

                <div class=" card shadow-lg rounded" style="background-color: rgba(210, 212, 214, 0.5);">
                    <div class=" card-body">
                        <h5 class="card-title text-center m-3">
                            <b>
                                Login to
                                <span class="text-success"><b>Continue</b></span>
                            </b>
                        </h5>
                        <div class="form my-5">
                            <!-- Login form  -->
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <label for="my-input"><b>Username</b></label>
                                    <input id="username" class="form-control" type="text" name="username"
                                        placeholder="Your username please..." required />
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="my-input"><b>Password</b></label>
                                    <input id="password" class="form-control" type="password" name="password"
                                        placeholder="Your password please..." required />
                                </div>
                                <br /><br />
                                <div class="d-flex justify-content-between">
                                    <button type="reset" class="btn btn-primary">Cancel</button>
                                    <button type="submit" class="btn btn-success">Login</button>
                                </div>
                            </form>
                            <!-- End Login Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>