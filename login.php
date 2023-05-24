<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/6f8f832437.js" crossorigin="anonymous"></script>

    <title>Login</title>
</head>
<body>

    <!-- navbar -->
    <nav>
        <ul>    
            <?php
                if (isset($_SESSION["id"])) {
            ?>
                <li><a href="#"><?php echo $_SESSION["id"]; ?></a></li>
                <li><a href="inc/logout.inc.php">Logout</a></li>
            <?php
                } else {
            ?>      
                <li><a class="active" href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            <?php
                }
            ?>
        </ul>
    </nav>

    <!-- form -->
    <div class="globalContainer">
        <div class="form-box">
            <h1>Login</h1>

                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyInput") {
                            echo "<center>Provide login essential!</center>";
                        }
                        else if ($_GET["error"] == "stmtFailed") {
                            echo "<center>Incorrect Login!</center>";
                        }
                        else if ($_GET["error"] == "wrongPass") {
                            echo "<center>Incorrect Password!</center>";
                        }
                    }
                ?>

            <form method="post" action="inc/login.inc.php">
                <div class="input-group">

                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="uname" placeholder="Username">
                    </div>

                    <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                        <input type="password" name="pass" placeholder="Password">
                    </div>

                </div>
                
                <div class="btn-field">
                    <button type="submit" name="submit">Login</button>
                </div>
                
                <h2 class="account"> Don't have an account?</h2>
                <a class="now" href="signup.php">Sign Up now!</a>   
            </form>
        </div>
    </div>
</body>
</html>