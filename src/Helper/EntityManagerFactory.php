<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '/src'],
            true
        );
        $connection = array(
            'dbname' => 'teste',
            'user' => 'root',
            'password' => 'joao',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        );
        return EntityManager::create($connection, $config);
    }
}