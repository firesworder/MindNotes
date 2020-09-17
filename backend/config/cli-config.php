<?php

use App\EntityManagerContainer,
    \Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once "bootstrap.php";

return ConsoleRunner::createHelperSet(EntityManagerContainer::getEntityManager());
