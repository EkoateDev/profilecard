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
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" value="" required />
                                <label for="name" class="form-label">Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="description" name="description" placeholder="Description Here" style="height: 100px" value="" required />
                                <label for="description">Description</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="champ" id="champ" placeholder="Enter the World championship row" value="" required />
                                <label for="championship" class="form-label">Championship</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="team" id="team" placeholder="Enter your Team" value="" required />
                                <label for="team" class="form-label">Team</label>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Select Image</label>
                                <input class="form-control" type="file" name="image" id="file-Upload" required />
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

        while ($row = mysqli_fetch_array($select)) {
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $champ = $row['champ'];
            $team = $row['team'];
            $fileName = $row['image'];

        ?>
            <div class="row row-cols-3 text-center">
                <div class="col">
                    <div class="card h-100">
                        <div class="avatar">
                            <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top" alt="" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center text-uppercase text-muted" id="title"><?php echo $row['name']; ?>
                            </h5>
                            <div class="text-center fs-4" id="description">Brief Details:<br> <?php echo $row['description']; ?></div>
                            <div class="text-center fs-5 text-white bg-success" id="champ">Championship:<br> <?php echo $row['champ']; ?></div>
                            <div class="text-center fs-5 text-white bg-dark" id="team">Team: <?php echo $row['team']; ?></div><br>
                            <a href="editdrivers.php?id=<?php echo $id ?>" role="button" class="btn btn-outline-success">Edit Driver</a>
                            <a href="deletedriver.php?id=<?php echo $id?>" class="btn btn-outline-danger">Delete Driver</a>
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
    </div>
</body>

</html>