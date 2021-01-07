<?php

use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$dql = "SELECT aluno FROM Alura\\Doctrine\\Entity\\Aluno aluno";
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();

foreach ($alunoList as $aluno){
    $telefones = $aluno
        ->getTelefones()
        ->map(function (Telefone $telefone){
            return $telefone->getNumero();
        })
        ->toArray();
    echo "ID: {$aluno->getId()}<br>Nome: {$aluno->getNome()}<br>";
    echo "Telefones: " . implode(', ', $telefones) . "<br><br>";
}
/*
$nico = $alunoRepository->find(3);
echo $nico->getNome();

$sergioLopes = $alunoRepository->findBy([
   'nome' => 'Sergio Lopes'
]);
echo "<pre>";
var_dump($sergioLopes);
echo "</pre>";
*/