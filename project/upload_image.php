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
    <title>Upload Image - Doctor's Vision </title>
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

        .file-input {
            display: none;
        }

        .file-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e45151;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
        }

        .file-btn:hover {
            background-color: #ea876b;
        }

        .image-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .image-preview img {
            width: 150px;
            height: 200px;
            object-fit: cover;
            border: 1px solid #9d9999;
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <main>
        <!-- Menu Section -->
        <div class="container-fluid px-0">
            <div class="card nav-menu shadow-lg">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="me-auto">
                            <h5 class="text-dark mx-5 fs-3 ">
                                <a href="./" class="nav-link" rel="noopener noreferrer">
                                    <b>Doctor's <span class="text-success"><b>Vision</b></span></b>
                                </a>
                            </h5>
                        </div>
                        <div class="mx-2">
                            <a name="upload-image" id="upload-image" class="btn btn-success" href="./">Home</a>
                        </div>
                        <div class="me-5"><a name="upload-image" id="upload-image" class="btn btn-secondary"
                                href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Menu Section  -->
        <div class="container">
            <br>
            <h3 class="fs-1 fw-bolder">Share your files </h3>

            <form action="upload.php" method="post" class="mt-3 mb-5" enctype="multipart/form-data">
                <div class="d-flex">
                    <button type="button" id="btn-select" class="btn btn-danger"
                        onclick="document.getElementById('imageInput').click();">
                        <strong> <i class="fa fa-plus" aria-hidden="true"></i> Select Image Files </strong></button>

                    <button type="submit" id="btn-upload" class="btn btn-success mx-3 ">Upload files</button>

                </div>
                <input type="file" name="images[]" class="file-input" accept="image/*" multiple id="imageInput">
                <br>
                <div class="image-preview " id="imagePreview"></div>

            </form>

            <script>
                document.getElementById('imageInput').addEventListener('change', function (event) {
                    const imagePreview = document.getElementById('imagePreview');
                    imagePreview.innerHTML = ''; // Clear previous previews
                    const files = event.target.files;

                    Array.from(files).forEach(file => {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const imgElement = document.createElement('img');
                            imgElement.src = e.target.result;
                            imagePreview.appendChild(imgElement);
                        };
                        reader.readAsDataURL(file);


                    });

                });
            </script>
        </div>


        <script>
            $(document).ready(function () {
                $("#btn-upload").hide();
                $("#btn-select").click(function () {
                    $("#btn-upload").show();

                });

            });
        </script>
</body>

</html>