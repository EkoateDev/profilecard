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

        <div class="container">
            <a href="index.php" class="btn btn-outline-warning">
                Go Back
            </a>
        </div>
        <br /><br />

        <div class="container">
            <form class="align-items-center" action="" method="POST" onSubmit="uploadSubmit();" enctype="multipart/form-data">
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

                    <button type="submit" class="btn btn-outline-success">
                        Update Driver
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="verification.js"></script>
</body>

</html>