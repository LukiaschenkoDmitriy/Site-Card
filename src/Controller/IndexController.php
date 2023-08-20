<?php

namespace App\Controller;

use App\Entity\Language;
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
        $projects = $entityManagerInterface->getRepository(Project::class)->findAll();
        $languages = $entityManagerInterface->getRepository(Language::class)->findAll();

        return $this->render("index/index.html.twig", [
            'skills' => $skills, 
            'projects' => $projects,
            "languages" => $languages
        ]);
    }
}
