<?php

require('../app/database.php');
require('filewriter.php');

$fileWriter = new FileWriter('../storage/email_list.txt');

$email = trim($_GET['email']);
$passwordraw = trim($_GET['password']);

if (isset($email) && !empty($email))
{
    if (isset($passwordraw) && !empty($passwordraw))
    {
        if (strlen($passwordraw) >= 7 && preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}/', $passwordraw))
        {
            $fileWriter->Save($email, $passwordraw);
            $password = md5($passwordraw);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sql = "INSERT INTO tbl_members (email, password) VALUES ('$email', '$password')";
                $database->query($sql);
                mail($email, 'De Gokkers - Registration', "Your account has been succesfully created");

                echo 'Dit is een valide email';
                $message = 'U bent geregistreerd';
            } else {
                echo 'Dit is absoluut geen email';
                $message = 'Geen geldig email meegegeven! Probeer het opnieuw.';
            }
        }
        else
        {
            echo 'Dit is absoluut geen wachtwoord';
            $message = 'Geen geldig wachtwoord meegegeven! Probeer het opnieuw.';
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
