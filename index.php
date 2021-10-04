<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>Profile Card!</title>
</head>

<body>
    <div class="container-lg">
        <h1>Displaying different Profiles for F1 Drivers</h1>
        <br /><br />
        <!-- Button trigger modal -->
        <div class="">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create a Driver
            </button>
        </div>
        <br /><br />

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Enter Driver's Details
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form class="align-items-center" action="upload.php" method="POST" onSubmit="uploadSubmit();" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter your Name" value="" required />
                                <label for="title" class="form-label">Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="description" name="description" placeholder="Description Here" style="height: 100px" value="" required />
                                <label for="description">Description</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="champ" id="champ" placeholder="Enter the World championship record" value="" required />
                                <label for="championship" class="form-label">Championship</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="team" id="team" placeholder="Enter your Team" value="" required />
                                <label for="team" class="form-label">Team</label>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Select Image</label>
                                <input class="form-control" type="file" name="image" id="fileUpload" required />
                            </div>

                            <div class="col-12">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-outline-success">
                                    Save Driver
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php

        include "connection.php"; // Using database connection file here

        $select = mysqli_query($conn, "SELECT * From drivers"); // fetch data from database

        while ($record = mysqli_fetch_array($select)) {

        ?>
            <div class="row row-cols-1 row-cols-md-3 g-4 text-center">
                <div class="col">
                    <div class="card h-100">
                        <div class="avatar">
                            <img src="uploads/<?php echo $record['image']; ?>" class="card-img-top" alt="" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center text-uppercase text-muted" id="title"><?php echo $record['title']; ?>
                            </h5>
                            <div class="text-center fs-4" id="description">Brief Details:<br> <?php echo $record['description']; ?></div>
                            <div class="text-center fs-5 text-white bg-success" id="champ">Championship:<br> <?php echo $record['champ']; ?></div>
                            <div class="text-center fs-5 text-white bg-dark" id="team">Team: <?php echo $record['team']; ?></div><br>
                            <a href="editdriver.php" class="btn btn-outline-success" >Edit Driver</a>
                            <a href="#" class="btn btn-outline-danger">Delete Driver</a>
                        </div>
                    </div>
                </div>
            </div><br>

        <?php
        }
        ?>

        <?php $conn->close(); // Close connection 
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="verification.js"></script>
</body>

</html>