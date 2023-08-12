<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;


interface DBControllerInterface
{
    public function add(EntityManagerInterface $entityManagerInterface) : Response;
    public function remove(EntityManagerInterface $entityManagerInterface) : Response;
    public function list(EntityManagerInterface $entityManagerInterface): Response;
}