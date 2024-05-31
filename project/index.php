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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exif-js/2.3.0/exif.js"></script>
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
                            <a class="nav-link active" href="#" aria-current="page">Home <span
                                    class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.html">Log in/Sign in</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Admin</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Admin</a>
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
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
                        <a name="" id="" class="btn btn-primary" href="upload.html"> + Upload Image</a>

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