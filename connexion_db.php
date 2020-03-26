<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=MVC_PiePHP', 'root', 'root');
} catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}