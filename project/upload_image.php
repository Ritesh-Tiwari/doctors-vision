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
        <div class="container my-5">
            <div class="card nav-menu shadow-lg">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="me-auto">
                            <h5 class="text-dark">
                                <a href="./" class="nav-link" rel="noopener noreferrer">
                                    <b>Doctor's <span class="text-success"><b>Vision</b></span></b>
                                </a>
                            </h5>
                        </div>
                        <div class="px-1">
                            <a name="upload-image" id="upload-image" class="btn btn-success" href="./">Home</a>
                        </div>
                        <div class="px-1"><a name="upload-image" id="upload-image" class="btn btn-secondary"
                                href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Menu Section  -->
        <div class="container">
            <h3 class="fs-lg-3 fw-bold text-dark">Upload your files</h3>
            <div class="pt-3">
                <div class="row py-3 mb-4 d-flex justify-content-center">
                    <!-- Image upload section -->
                    <div class="col-12 col-lg-5 col-md-5 col-sm-11 me-lg-auto">
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded image-box">
                            <!-- image preview  -->
                            <img src="assets/images/default-image.jpg" id="uploadPreview" class="card-img-top"
                                alt="Image Preview" />
                            <div class="card-body">
                                <!-- Upload image form -->
                                <form action="upload.php" method="POST" enctype="multipart/form-data">
                                    <h5 class="card-title">Upload image</h5>
                                    <input type="file" name="image" id="uploadImage" class="py-3"
                                        onchange="PreviewImage();" style="overflow: hidden"
                                        accept="image/png, image/gif, image/jpeg" required />
                                    <button type="submit" name="submit" class="btn btn-success">Upload</button>
                                </form>
                                <!-- End form -->
                            </div>
                        </div>

                        <script type="text/javascript">
                        function PreviewImage() {
                            var oFReader = new FileReader();
                            oFReader.readAsDataURL(
                                document.getElementById("uploadImage").files[0]
                            );

                            // document.getElementById("output").textContent = ;

                            oFReader.onload = function(oFREvent) {
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

                                reader.onload = function(event) {
                                    const image = new Image();

                                    image.onload = function() {
                                        EXIF.getData(image, function() {
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
                    <!-- End Image upload section -->

                    <!-- Image Information section  -->
                    <div class="shadow-lg p-3 mb-5 bg-body rounded col-12 col-lg-6 col-md-6 col-sm-11">
                        <div>
                            <h4 class="p-2">Image Informations:</h4>
                            <br />
                            <div class="ps-2" id="output"></div>
                        </div>
                    </div>
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