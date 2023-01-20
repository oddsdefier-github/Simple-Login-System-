<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script defer src="js/validation.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/signup-style.css">
</head>
<!----Body with inline style---->
<body class="signup">


<!-----Content wrapper/container----->
    <div class="container">

                <!-----Text on left side including "Clarendon Hub"---->
                <div class="header">

                        <h1>Clarendon Hub</h1>
                        <div class="login">
                            <a href="login.php">Log in</a>
                        </div>

                </div>

                <!------Sign up card containing input fields, title, and link(signup)--->
                <center>
                <div class="sign-up-card">

                             <!------Sign up header element--->
                            <center>
                                    <div class="sign-up-card-header">

                                        <h1>Sign Up</h1>
                                        <p>Please don't leave it blank before signing up.</p>
                                                                            
                                    </div>
                            </center>

                            <!--------Input fields container/wrapper------>
                            <center>
                            <div class="sign-up-card-form">

                                    <center>
                                    <form action="process-signup.php" method="POST" id="signup" novalidate>
                                            
                                                <div class="sign-up-field">
                                                    
                                                    <input type="text" id="name" name="name" placeholder="Name" required>

                                                </div>

                                                <div class="sign-up-field">
                                                
                                                    <input type="email" id="email" name="email" placeholder="Email" required> 

                                                </div>

                                                <div class="sign-up-field">
                                                
                                                    <input type="password" id="password" name="password" placeholder="Password" required>

                                                </div>

                                                <div class="sign-up-field">
                                                
                                                    <input type="password" id="password_confirmation" 
                                                    name="password_confirmation" placeholder="Confirm Password" required>

                                                </div>

                                                <div class="sign-up-btn">
                                                    <button>Sign up</button>
                                                </div>
                                    </form>
                                    </center>

                            </div>
                            </center>


                </div>
                </center>
    </div>
</body>
</html>