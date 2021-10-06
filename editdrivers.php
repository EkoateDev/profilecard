<?php

require_once "connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM drivers WHERE id='" . $id . "'";
    $select = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($select);
    $id = $row['id'];
    $name = $row['name'];
    $description = $row['description'];
    $champions = $row['champ'];
    $team = $row['team'];
    $fileName = $row['image'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>Edit Card!</title>
</head>

<body>
    <div class="container-lg">
        <h1>Edit Drivers here </h1>
        <br /><br />

        <div class="">
            <a href="index.php" class="btn btn-outline-warning">
                Go Back
            </a>
        </div>
        <br />

        <div class="">
            <form class="align-items-center" action="updated.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" value="<?php echo $name ?>" />
                    <label for="name" class="form-label">Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description Here" style="height: 100px" value="<?php echo $description ?>" />
                    <label for="description">Description</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="champ" id="champ" placeholder="Enter the World championship record" value="<?php echo $champions ?>" />
                    <label for="championship" class="form-label">Championship</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="team" id="team" placeholder="Enter your Team" value="<?php echo $team ?>" />
                    <label for="team" class="form-label">Team</label>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Select Image</label>
                    <input class="form-control" type="file" name="image" id="file-Upload" value="" />
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-outline-success">
                        Update Driver
                    </button>
                </div>
            </form>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="verification.js"></script>
    </div>
</body>

</html>