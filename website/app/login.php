<?php
session_start();

require('../app/database.php');

$isEmailSucces = false;
$isPasswordSucces = false;

$email      = trim($_GET['email']);
$passwordraw   = trim($_GET['password']);
$password = md5($passwordraw);

$sqlemail = "SELECT * FROM tbl_members WHERE email LIKE '%%'";
$emails = $database->query($sqlemail)->fetchAll(PDO::FETCH_ASSOC);

$sqlpassword = "SELECT * FROM tbl_members WHERE password LIKE '%%'";
$passwords = $database->query($sqlpassword)->fetchAll(PDO::FETCH_ASSOC);

foreach($emails as $emailcontrol)
{
    if (isset($email) && !empty($email))
    {
        if ($email == $emailcontrol['email'])
        {
            echo 'email succes!';
            $isEmailSucces = true;
        }
    }
}

foreach($passwords as $passwordcontrol)
{
    if (isset($password) && !empty($password))
    {
        if ($password == $passwordcontrol['password'])
        {
            echo 'password succes!';
            $isPasswordSucces = true;
        }
    }
}

if (isset($email) && !empty($email))
{
    if (isset($password) && !empty($password))
    {
        if ($isEmailSucces == true && $isPasswordSucces == true)
        {
            echo 'U bent ingelogt';
            $message = 'U bent ingelogt';
            $_SESSION['logged_in'] = true;
        }
        else
        {
            echo 'Inloggen mislukt';
            $message = 'Inloggen mislukt';
            $_SESSION['logged_in'] = false;
        }
    }
    else
    {
        $message = 'Geen wachtwoord meegegeven! Probeer het opnieuw.';
    }
}
else
{
    $message = 'Geen email meegegeven! Probeer het opnieuw.';
}

header("Location: ../public/index.php?message=$message");
