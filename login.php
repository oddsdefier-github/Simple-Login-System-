<?php 

        $is_invalid = false;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

                $mysqli = require __DIR__ . "/database.php";

                $sql = sprintf("SELECT * FROM user 
                                WHERE email = '%s'",
                                $mysqli->real_escape_string($_POST["email"]));

                $result = $mysqli->query($sql);

                $user = $result->fetch_assoc();
        
                if ($user) {
                        if(password_verify($_POST["password"], $user["password_hash"])) {

                                session_start();

                                session_regenerate_id();

                                $_SESSION["user_id"] = $user["id"];

                                header("Location: index.php");
                                exit;
                        }
                }

        $is_invalid = true;

        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log In</title>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validation.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/login-style.css" >
    <link rel="stylesheet" href="css/global.css">
</head>
<body class="login">          
    <!-----Container----->
    <div class="container">
                <!-----Text on left side including "Clarendon Hub"---->
                <div class="header">
                
                        <h1>Clarendon Hub</h1>
                        <div class="signup">
                                <a href="signup.php">Sign up</a>
                        </div>              

                </div>

                <!------Log in card containing input fields, title, and link(signup)--->
                <center>
                <div class="login-card">
                                <!------Log in header element--->
                                <div class="login-card-header">

                                <h1>Log in</h1>
                                <p>Please provide correct information below.</p>
                                
                                </div>
                                <!-------Invalid login error message including center property---->
                                <center>
                                        <div class="error">
                                                <?php if ($is_invalid): ?>
                                                        <i class="fa-solid fa-circle-exclamation"></i>
                                                        <p>Invalid Login</p>
                                                <?php endif; ?>
                                        </div>
                                </center>
                                
                                <!--------Input fields container/wrapper------>
                                <div class="login-card-form">

                                        <form method="post">

                                                <div class="login-input-field">
                                                        <i class="fa-regular fa-envelope"></i>
                                                        <input type="email" name="email" id="email" placeholder="Email"
                                                        value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
                                                </div>
                                                
                                                <div class="login-input-field">
                                                        <i class="fa-solid fa-lock"></i>
                                                        <input type="password" name="password" id="password" placeholder="Password" required>
                                                </div>
                                                <div class="login-btn">
                                                        <button>Login</button>
                                                </div>

                                        </form>

                                </div>

                                        
                </div>
                </center>
    </div>

</body>
</html>