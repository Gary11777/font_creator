<?php

declare(strict_types=1);

// session_start();

// Autoload classes.
/*
spl_autoload_register('autoloader');
function autoloader(string $class_name): void
{
    require_once('class/' . $class_name . '.class.php');
}
*/
require_once('class/Template.class.php');
$template_object = new Template();

// Load points of menu
require_once('db/menu_points.php');


// Set main template
$template_object->setMainTemplate('templates/main.tpl');
// Set points of menu
$template_object->setMenuPoints($menu_points);

// ----- MAIN LOGIC HERE -----
// ---------------------------
$template_object->processTemplate();
echo $template_object->getFinalPage();
