<?php
require __DIR__ . '/funct.php'; //connect funct.php

/* Check login and password on empty */
if (empty($_POST['login']) || empty($_POST['pass'])) {
    header('Location:form.html');
    exit;
}

$login = $_POST['login'];
$password = $_POST['pass'];

/* Check login and password on true*/
if (((existsUser($login)) == true && (password_verify($password, getUsersList()[$login]) == true))) {
    /* output on index5.php*/
    login($login);
    getCurrentUser();
    header('Location:index5.php');
    exit;
}

header('Location:form.html');

