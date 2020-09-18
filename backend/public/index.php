<?php
require_once getenv('PROJECT_DIR') . '/config/bootstrap.php';

use App\Kernel;

$app = new Kernel();
$app->execute();