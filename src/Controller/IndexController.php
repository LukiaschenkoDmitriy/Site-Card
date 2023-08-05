<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Project;
use App\Entity\Skill;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(EntityManagerInterface $entityManagerInterface): Response
    {
        $skills = $entityManagerInterface->getRepository(Skill::class)->findAll();

        return $this->render("/index/index.html.twig", ['skills' => $skills]);
    }
}
