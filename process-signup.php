<?php

        
        //Checking the input and validating it

        if (empty($_POST["name"])) {
            die("Name is required");
        }
        
        if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            die("Valid email is required");
        }
        
        if (strlen($_POST["password"]) < 8){
            die("Password must be at least 8 characters");
        }

        if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
            die("Password must contain at least one letter");
        }
        if ( ! preg_match("/[0-9]/", $_POST["password"])) {
            die("Password must contain at least one number");
        }
        
        if ($_POST["password"] !== $_POST["password_confirmation"]) {
            die("Passwords must match");
        }

 //Using password hash function to turn password into hash for security purposes.
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);


//Connection to database.
$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash)
VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}


$stmt->bind_param("sss",
                   $_POST["name"],
                   $_POST["email"],
                   $password_hash);

$result = $stmt->execute();

        //If data is retrieved, it will redirect to sign-up success page.
        if ($result && $mysqli->affected_rows === 1) {
            header("Location: signup-success.php");
            exit;
        //If data input has matched in database message will appear.
        } else if ($result && $mysqli->affected_rows !== 1) {
            die("Email already taken");
            
        } else {
            die($mysqli->error . " " . $mysqli->errno);
        }
                   
