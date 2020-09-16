<?php
require_once "bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(\App\EntityManagerContainer::getEntityManager());
