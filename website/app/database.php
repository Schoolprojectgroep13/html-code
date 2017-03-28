<?php

$database = new PDO
('mysql:host=localhost;port=3307;dbname=login_app',
    'root',
    '');
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

