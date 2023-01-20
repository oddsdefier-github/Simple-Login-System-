<?php

//Session start(create a session or resume the current one)
session_start();


    if (isset($_SESSION["user_id"])) {


        $mysqli = require __DIR__ . "/database.php";

        $sql = "SELECT * FROM user 
                WHERE id = {$_SESSION["user_id"]}";
                

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/global.css" >
    <link rel="stylesheet" href="css/login-style.css">
</head>
<body style="background-color: #F3EFE0;">

    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 100vw; height: 100vh;">
        
        <div class="header" style="position: absolute; left: calc(100vw - 90vw); top: 3%; ">
            <h1>Clarendon Hub</h1>
        </div>
        

        
            <?php if (isset($user)): ?>

                <p style="text-align: center;"> <span style="font-family: 'Mango'; font-size: 5rem; font-weight: 600; color: #434242;;">hi.</span> <br> Welcome, <span style="font-weight: 400; color: #22A39F;"><?= htmlspecialchars($user["name"]) ?> </span> </p>


                <div class="logout">
                        <a href="logout.php"><span class="logout-text"><p>Log out</span></p></a>
                </div>


            <?php else: ?>

                    <span style="font-family: 'Mango'; font-size: 5rem; font-weight: 600; color: #434242;;">Welcome.</span>
                    <p class="action-button"><a href="login.php">Log in</a> &nbsp; or  &nbsp;<a href="signup.php">Sign up</a></p>



            <?php endif; ?>
    </div>
        
</body>
</html>