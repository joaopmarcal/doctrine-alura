<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunoList  */
$alunoList = $alunoRepository->findAll();

foreach ($alunoList as $aluno){
    echo "ID: {$aluno->getId()}<br>Nome: {$aluno->getNome()}<br><br>";
}

$nico = $alunoRepository->find(3);
echo $nico->getNome();

$sergioLopes = $alunoRepository->findOneBy([
   'nome' => 'Sergio Lopes'
]);
echo "<pre>";
var_dump($sergioLopes);
echo "</pre>";