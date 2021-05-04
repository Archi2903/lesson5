<?php
require __DIR__ . '/funct.php';
require __DIR__ . '/upload.php';


if (!getCurrentUser()) {
    header('Location:form.html');
    exit;
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/img/avtar/ico/edit.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- link bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <title>Homedata</title>
</head>
<body>
<header>
    <div class="jumbotron text-center sm" style="margin-bottom:0">
        <h1>Lesson 5</h1>
        <p>Authorize</p>
    </div>
    <nav class="navbar navbar-expand bg-dark navbar-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link" href="/index.html">
                            <img src="/img/home.png" alt="home" width="20" height="20"
                                 class="d-inline-block align-text-top">
                            In lessons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exit.php">
                            <img src="/img/outdoor.png" alt="outdoor" width="20" height="20"
                                 class="d-inline-block align-text-top">
                            Leave to site!</a>
                    </li>
                </ul>
            </div>
        </div>
</header>
<main class="container">
    <h5 class="text-center "> Welcome on site my dear
        <u class="font-italic"><?php echo getCurrentUser(); ?></u>!</h5>
    <hr>
    <div>
        <h2 class="display-4 text-center"> Upload images</h2>
        <form action="script.php" method="post" enctype="multipart/form-data">
            <div class="custom-file">
                <input type="file" name="file" id="file" class="custom-file-input">
                <label class="custom-file-label" for="file">Chose file</label>
            </div>
            <button type="submit" class="btn btn-dark">Upload</button>
        </form>
    </div>
    <hr>
    <div class="jumbotron">
        <h4>History</h4>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Date</th>
                <th scope="col" class="text-center">User</th>
                <th scope="col" class=" text-center">Image</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (newRecord() as $record): ?>
                <tr>
                    <td><?php echo $record[0] ?></td>
                    <td class="text-center"><?php echo $record[1] ?></td>
                    <td class="text-center"><img src="/lesson5<?php echo $record[2] ?>" width="120"></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<footer>

</footer>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</body>
</html>