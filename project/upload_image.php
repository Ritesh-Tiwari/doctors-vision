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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
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
                                </svg>
                                <?php echo $_SESSION['username'];?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="logout.php" aria-current="page">Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h3 class="fs-3 fw-bold text-dark pt-5">Upload your files</h3>
            <div class="pt-3">
                <div class="row py-3 d-flex justify-content-center">
                    <div class="col-11 col-lg-6 col-md-6 col-sm-11">
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 80%; align-items: center">
                            <img src="images/default-image.jpg" id="uploadPreview" class="card-img-top"
                                alt="Image Preview" />
                            <div class="card-body">
                                <form action="upload.php" method="POST" enctype="multipart/form-data">
                                    <h5 class="card-title">Upload image</h5>
                                    <input type="file" name="image" id="uploadImage" class="py-3"
                                        onchange="PreviewImage();" style="overflow: hidden"
                                        accept="image/png, image/gif, image/jpeg" required />
                                    <button type="submit" name="submit" class="btn btn-success">Upload</button>
                                </form>
                            </div>
                        </div>

                        <script type="text/javascript">
                            function PreviewImage() {
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(
                                    document.getElementById("uploadImage").files[0]
                                );

                                // document.getElementById("output").textContent = ;

                                oFReader.onload = function (oFREvent) {
                                    document.getElementById("uploadPreview").src =
                                        oFREvent.target.result;
                                };

                                //  image details : 
                                // Get the file input element
                                const fileInput = $("#uploadImage")[0];
                                // Retrieve the selected file
                                const file = fileInput.files[0];

                                if (file) {
                                    const imageType =
                                        /^image\//; // Regular expression to match image MIME types

                                    if (!imageType.test(file.type)) {
                                        alert("Please select a valid image file.");
                                        // Clear the file input value to allow reselection
                                        event.target.value = null;
                                        return; // Stop further processing
                                    }
                                    const reader = new FileReader();

                                    reader.onload = function (event) {
                                        const image = new Image();

                                        image.onload = function () {
                                            EXIF.getData(image, function () {
                                                const metadata = {
                                                    name: file.name,
                                                    type: file.type,
                                                    size: file.size,
                                                    width: image.width,
                                                    height: image.height,
                                                    exifData: EXIF.getAllTags(this),
                                                    gpsData: EXIF.getTag(this,
                                                        "GPSLatitude") ? {
                                                        latitude: EXIF.getTag(this,
                                                            "GPSLatitude"),
                                                        longitude: EXIF.getTag(this,
                                                            "GPSLongitude"),
                                                    } : null,
                                                };
                                                console.log(metadata);

                                                document.getElementById("output").innerHTML = `
                            <p>Name: ${metadata.name}</p>
                            <p>Type: ${metadata.type}</p>
                            <p>Size: ${metadata.size} bytes</p>
                            <p>Width: ${metadata.width} pixels</p>
                            <p>Height: ${metadata.height} pixels</p>
                            <p>EXIF Data: ${JSON.stringify(
                                                    metadata.exifData
                                                )}</p>
                            <p>GPS Data: ${metadata.gpsData
                                                        ? `Latitude: ${metadata.gpsData.latitude}, Longitude: ${metadata.gpsData.longitude}`
                                                        : "No GPS data found"
                                                    }</p>
              
                        `;
                                            });
                                        };

                                        image.src = event.target.result;
                                    };

                                    reader.readAsDataURL(file);
                                }
                            }
                        </script>
                    </div>

                    <div class="shadow-lg p-3 mb-5 bg-body rounded col-11 col-lg-6 col-md-6 col-sm-11">
                        <div>
                            <h4 class="p-2">Image Informations:</h4>
                            <br />
                            <div class="ps-2" id="output"></div>
                        </div>
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

    <script>
        $(function () {
            $(function () {
                $("#selectImageButton").click(function () {
                    // Get the file input element
                    const fileInput = $("#uploadImage")[0];
                    // Retrieve the selected file
                    const file = fileInput.files[0];

                    if (file) {
                        const imageType =
                            /^image\//; // Regular expression to match image MIME types

                        if (!imageType.test(file.type)) {
                            alert("Please select a valid image file.");
                            // Clear the file input value to allow reselection
                            event.target.value = null;
                            return; // Stop further processing
                        }
                        const reader = new FileReader();

                        reader.onload = function (event) {
                            const image = new Image();

                            image.onload = function () {
                                EXIF.getData(image, function () {
                                    const metadata = {
                                        name: file.name,
                                        type: file.type,
                                        size: file.size,
                                        width: image.width,
                                        height: image.height,
                                        exifData: EXIF.getAllTags(this),
                                        gpsData: EXIF.getTag(this,
                                            "GPSLatitude") ? {
                                            latitude: EXIF.getTag(this,
                                                "GPSLatitude"),
                                            longitude: EXIF.getTag(this,
                                                "GPSLongitude"),
                                        } : null,
                                    };
                                    console.log(metadata);

                                    document.getElementById("output").innerHTML = `
                            <p>Name: ${metadata.name}</p>
                            <p>Type: ${metadata.type}</p>
                            <p>Size: ${metadata.size} bytes</p>
                            <p>Width: ${metadata.width} pixels</p>
                            <p>Height: ${metadata.height} pixels</p>
                            <p>EXIF Data: ${JSON.stringify(
                                        metadata.exifData
                                    )}</p>
                            <p>GPS Data: ${metadata.gpsData
                                            ? `Latitude: ${metadata.gpsData.latitude}, Longitude: ${metadata.gpsData.longitude}`
                                            : "No GPS data found"
                                        }</p>
              
                        `;
                                });
                            };

                            image.src = event.target.result;
                        };

                        reader.readAsDataURL(file);
                    }
                });
            });
        });
    </script>
</body>

</html>