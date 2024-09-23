<?php
if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];
    $filepath = "certificates/" . $filename;

    if (file_exists($filepath)) {
        
        echo '<html>
                <head>
                    <title>Registration Success</title>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
                    <style>
                        .container {
                            margin-top: 100px;
                            text-align: center;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Registration Success!</h4>
                            <p>The Registration is completed successfully.</p>
                            <p>Thank You for using our online services.</p>
                            <p>Kindly visit our nearest collection center with your ID proof</p>
                            <p>Your e-certificate has been successfully generated.</p>
                            <hr>
                            <p class="mb-0">Download your e-certificate below.</p>
                            <a class="btn btn-primary mt-3" href="' . $filepath . '" download>Download Certificate</a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="alert alert-danger">
                        <a class="btn btn-danger sm-1" href="home.php">Home</a>
                    </div>
                    </div>
                </body>
            </html>';
    } else {
        echo "Certificate not found.";
        echo '<html>
        <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
                    <style>
                        .container {
                            margin-top: 100px;
                            text-align: center;
                        }
                    </style>
                </head>
        <body>        
        <div class="container">
                        <div class="alert alert-danger">
                        <a class="btn btn-danger sm-1" href="home.php">Home</a>
                    </div>
                    </div>
        </body>
        </hmtl>';
    }
} else {
    echo "Filename parameter not found.";
}
?>