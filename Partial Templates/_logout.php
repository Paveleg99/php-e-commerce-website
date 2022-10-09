<?php

session_start();
echo "Выходим из системы... Пожалуйста подождите";
unset($_SESSION["loggedin"]);
unset($_SESSION["userName"]);
unset($_SESSION["userID"]);

// session_unset();
// session_destroy();

header("location: /index.php");
