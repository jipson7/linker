<?php

session_start();

$statusName = array('loginValue' => $_SESSION['loginStatus'], 'user' => $_SESSION['user']);

echo json_encode($statusName);

?>