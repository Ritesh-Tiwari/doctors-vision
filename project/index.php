<?php
@session_start();
if (!$_SESSION['is_login']){

    // Redirect to another page
    header("Location: login_page.php");
    exit();
    
    // Flush the output buffer
    ob_end_flush();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor's Vision </title>
    <!-- Required meta tags -->

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.1 -->

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exif-js/2.3.0/exif.js"></script>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
    body {
        background-color: rgb(254, 254, 254);
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
        <!-- Image section -->
        <div class="container mt-5">

            <div class="row">
                <?php

                    $empty = (count(glob("./share-files/images/*")) === 0) ? 1 : 0;
                    if ($empty===1){
                        echo "<div class='text-center'>";
                        echo '<img src="assets/images/not-found.jpg"  width="200px" style="border-radius: 50%;" />';
                        echo "<div class='mt-2'><h3 class='text-center'><b>Image files not Found. <br> Upload your images </b> </h3></div>";
                        echo "</div>";
                    }

                ?>
                <div class="col-10 mx-auto">
                    <h4 class="fs-3 fw-bold">Doctor's Vision Prediction...</h4><br>

                    <div class="row">
                        <?php
                        $directory = "./share-files/images/"; // Replace with your directory path
                        $iterator = new DirectoryIterator($directory);
                        
                        foreach ($iterator as $fileinfo) {
                            if ($fileinfo->isFile()) {
    
                        echo '<div class="col-6">

                            <a href="share-files/images/'.$fileinfo->getFilename().'" target="_blank"><img src="share-files/images/'.$fileinfo->getFilename().'" alt="'.$fileinfo->getFilename().'" srcset="" width=200px
                                class="card p-2 bg-light"></a>
                                 <p class="mt-2"><b>'. $fileinfo->getFilename() .'</b></p>

                        </div>
                        <div class="col-6">
                            <button type="button" id="btn_classify" class="btn btn-outline-danger fw-bold">Classify</button>
                            <div class="alert alert-success mt-3" role="alert">
                                <span id="results">Click on Classify button to predict the result</span>
                            </div>
                        </div>';
                            }
                        }
                        ?>
                        <?php

                        // These codes can be used in future
                    /*$directory = "./share-files/images/"; // Replace with your directory path
                    $iterator = new DirectoryIterator($directory);
                    
                    foreach ($iterator as $fileinfo) {
                        if ($fileinfo->isFile()) {

                            echo '
                            
                            <script>
                                $(document).ready(function () {
                                    // URL of the JSON file
                                    var jsonFileUrl = "./share-files/results/data.json";

                                    // Perform AJAX request using getJSON
                                    $.getJSON(jsonFileUrl, function (data) {
                                        console.log("JSON data:", data);
                                        $("#backend-result").text("Results : " + data);
                                    }).fail(function (jqXHR, textStatus, errorThrown) {
                                        console.error("Error reading JSON file:", textStatus, errorThrown);
                                        $("#backend-result").text("Error reading JSON file.");
                                    });
                                });
                            </script>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="share-files/images/'.$fileinfo->getFilename().'" class="card-img-top" alt="'.$fileinfo->getFilename().'" style="height: 200px; width: 100%;">
                                    <div class="card-body">
                                        <p><b>'. $fileinfo->getFilename() .'</b></p>
                                        <p id="backend-result"></p>

                                    </div>
                                    <div class="card-footer">
                                        <a class="btn btn-success" href="get_results.php" target="_blank"> Classify </a>
                                        
                                        <a class="btn btn-dark" href="delete_image.php?delete_file=share-files/images/'.$fileinfo->getFilename().'"> Delete </a>
                                                   
                                    </div>
                                </div>
                            </div>';
                            // <a class="btn btn-success" href="details.php?src=share-files/images/'.$fileinfo->getFilename().'" target="_blank"> Clacify </a>
                                        
                            
                            
                        }
                    }*/
                    ?>


                    </div>
                </div>
            </div>

        </div>

        <!-- End Image Ssection -->
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src=" assets/js/popper.min.js">
    </script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {

        $("#btn_classify").click(function() {

            $.get("./get_results.php", function(data, status) {
                $("#results").html("Prediction : <b> " + data + "</b>");

            });
        });

    });
    </script>

</body>

</html>