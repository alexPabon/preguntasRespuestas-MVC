<?php
session_start();	//usaremos sesiones
include '../../preguntas/config/config.php';
include '../../preguntas/libraries/Autoload.php';
include '../../preguntas/templates/Template.php';


//invocar al controlador frontal que se encargara de gestrionar los controladores
FrontController::main();

