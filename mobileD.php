<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        .nav {
            height: 50px;
            background: #2c3e50;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.4);
            font-family: 'Poppins', sans-serif;
        }

        .nav a {
            text-decoration: none;
            color: white;
        }

        .nav ul {
            display: flex;
            justify-content: flex-end;
            margin-right: 25px;
        }

        .nav ul li {
            display: inline-block;
            line-height: 50px;
            margin: 0 15px;
            list-style: none;
        }

        .nav ul li span {
            font-size: 20px;
            color: white;
        }

        .nav ul li a {
            position: relative;
            color: white;
            font-size: 18px;
            padding: 5px 0;
        }

        .nav ul li a::before {
            position: absolute;
            content: '';
            left: 0;
            bottom: 0;
            height: 3px;
            width: 100%;
            background: white;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s linear;
        }

        .nav ul li a:hover::before,
        .nav ul li a.active::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        .nav ul li a:hover,
        .nav ul li a.active {
            color: white;
            text-decoration: none;
        }
    </style>

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Phone Directory</title>
</head>

<body>

    <!-- navbar -->
    <nav class="nav">
        <ul>
            <?php
            if (isset($_SESSION["uname"])) {
            ?>
                <li><span><?php echo $_SESSION["uname"]; ?></span></li>
                <li><a href="inc/logout.inc.php">Logout</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>

    <h1 class="bg-dark text-light text-center py-2">Mobile Directory</h1>

    <div class="container">

        <!-- form modal -->
        <?php include 'mobileD/profile.php'; ?>
        <?php include 'mobileD/form.php'; ?>

        <!-- input and button section -->
        <div class="row mb-3">
            <div class="col-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-magnifying-glass"></i><span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#userModal">Add new account</button>
            </div>
        </div>

        <!-- table -->
        <?php include 'mobileD/table.php'; ?>

        <!-- pagination -->
        <nav aria-label="Page navigation example" id="pagination">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
        </nav>
    </div>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- bootsrap script-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>