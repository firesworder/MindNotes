<?php
require_once getenv('PROJECT_DIR') . "/vendor/autoload.php";
use App\EntityManagerContainer;

ini_set('display_errors', getenv('ENV') === 'development');

new EntityManagerContainer();