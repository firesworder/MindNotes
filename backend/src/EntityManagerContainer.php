<?php


namespace App;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Yaml\Yaml;

class EntityManagerContainer
{
    private static $entityManager;

    public function __construct()
    {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration([getenv('PROJECT_DIR') . '/src/Entity'], $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        $connParams = Yaml::parseFile(getenv('PROJECT_DIR') . '/config/db_params.yaml');
        if(!$connParams) {
            throw new \Exception('Не удалось получить данные из config/db_params.yaml. Файл не существует?');
        }

        self::$entityManager = EntityManager::create($connParams['parameters'], $config);
    }

    /**
     * @return EntityManager
     */
    public static function getEntityManager()
    {
        return self::$entityManager;
    }
}