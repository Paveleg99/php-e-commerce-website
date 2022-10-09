<?php

session_start();
echo "Выходим из системы. Пожалуйста подождите...";
unset($_SESSION["adminloggedin"]);
unset($_SESSION["adminusername"]);
unset($_SESSION["adminuserID"]);

// session_unset();
// session_destroy();

header('Location: ' . $_SERVER['HTTP_REFERER']);
