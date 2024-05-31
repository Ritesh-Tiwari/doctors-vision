<?php
@session_start();
if (!$_SESSION['is_login']){

    // Redirect to another page
    header("Location: login.html");
    exit();
    
    // Flush the output buffer
    ob_end_flush();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor's Vision | Cloud97</title>
    <!-- Required meta tags -->

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.1 -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exif-js/2.3.0/exif.js"></script>
    <style>
    * {
        font-family: "PT Serif", serif;
        font-weight: 400;
        font-style: normal;
    }

    .navbar-brand {
        font-family: "PT Serif", serif;
        font-weight: 700;
        font-style: normal;
    }
    </style>

</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Doctor's Vision</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" aria-current="page">
                                <i class="fa fa-th-large" aria-hidden="true"></i>
                                Home <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#" aria-current="page">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#5f6368">
                                    <path
                                        d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                </svg> <?php echo $_SESSION['username'];?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="logout.php" aria-current="page">Logout </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div class="shadow-lg card pt-5" style="height: 90vh; margin-left: -10px;"
                        style="position: sticky;">

                        <h5 class="card-title p-3">Uploaded Files</h5>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">

                                <?php
                            $directory = "share-files/"; // Replace with your directory path
                            $iterator = new DirectoryIterator($directory);
                            
                            foreach ($iterator as $fileinfo) {
                                if ($fileinfo->isFile()) {
        
                               echo '<li class="list-group-item">'.$fileinfo->getFilename().'</li>';
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="my-4">
                        <a name="" id="" class="btn btn-primary" href="upload_image.php">
                            <i class="fa fa-plus-square"></i> <b>Upload Image</b>
                        </a>

                    </div>

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php
                    $directory = "share-files/"; // Replace with your directory path
                    $iterator = new DirectoryIterator($directory);
                    
                    foreach ($iterator as $fileinfo) {
                        if ($fileinfo->isFile()) {

                            echo '<div class="col">
                                <div class="card h-100">
                                    <img src="share-files/'.$fileinfo->getFilename().'" class="card-img-top" alt="'.$fileinfo->getFilename().'" style="height: 200px; width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">'. $fileinfo->getFilename() .'</h5>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                                    </div>
                                </div>
                            </div>';

                            
                            
                        }
                        }
                        ?>


                    </div>
                </div>
            </div>

        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>


</body>

</html>