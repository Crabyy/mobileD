<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            overflow: hidden;
        }
    </style>

    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/6f8f832437.js" crossorigin="anonymous"></script>

    <title>Sign up</title>
</head>
<body>

    <!-- navbar -->
    <nav>
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a class="active" href="signup.php">Sign Up</a></li>
        </ul>
    </nav>

    <!-- form -->
    <div class="globalContainer">
        <div class="form-box">
            <h1>Sign up</h1>
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyInput") {
                            echo "<center><p>Please fill up all fields!</p></center>";
                        }
                        else if($_GET["error"] == "invalidUname"){
                            echo "<center><p>Invalid Username!</p></center>";
                        }
                        else if($_GET["error"] == "invalidEmail"){
                            echo "<center><p>Invalid Email!</p></center>";
                        }
                        else if($_GET["error"] == "passNotMatch"){
                            echo "<center><p>Passwords do not match!</p></center>";
                        }
                        else if($_GET["error"] == "stmtFailed"){
                            echo "<center><p>Something went wrong!</p></center>";
                        }
                        else if($_GET["error"] == "alreadyExist"){
                            echo "<center><p></u>Username or Email already taken!</p></center>";
                        }
                        else if($_GET["success"] == "registered"){
                            echo "<center><p>Congratulations! You successfully signed up, Welcome!</p></center>";
                        }
                    }
                ?>
            <form method="post" action="inc/signup.inc.php">
                <div class="input-group">

                    <div class="input-field">
                    <i class="fa-solid fa-person-rays"></i>
                        <input type="text" name="name" placeholder="Name">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="uname" placeholder="Username">
                    </div>

                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email">
                    </div>

                    <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                        <input type="password" name="pass" placeholder="Password">
                    </div>

                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="conpass" placeholder="Confirm Password">
                    </div>

                </div>
                <div class="btn-field">
                    <button type="submit" name="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>