<?php

$controller = $_GET['controller'] ?? 'correo';
$action = $_GET['action'] ?? 'index';

require_once 'controllers/CorreoController.php'; 

$objet = new correoController();
$objet->$action();