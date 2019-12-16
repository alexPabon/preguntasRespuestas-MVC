<?php
session_start();	//usaremos sesiones
include 'config/config.php';
include 'libraries/Autoload.php';
include 'templates/Template.php';

//invocar al controlador frontal que se encargara de gestrionar los controladores
FrontController::main();
