<?php

class FileWriter
{
    private $filelocation;
    private $email;
    private $password;

    public function __construct($location)
    {
        $this->filelocation = $location;
    }

    public function Save($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

        //input opslaan in bestand
        file_put_contents($this->filelocation, $this->email . " - " . $this->password . PHP_EOL, FILE_APPEND);
    }
}
