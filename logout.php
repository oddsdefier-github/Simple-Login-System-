<?php

//Creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
session_start();


//Destroys all of the data associated with the current session. 
session_destroy();

//After session destroy the page will redirect to index page.
header("Location: index.php");
exit;