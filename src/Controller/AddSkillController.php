<?php

namespace App\Controller;

use App\Service\DBService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddSkillController extends AbstractController
{
    #[Route('/add/skill', name: 'app_add_skill')]
    public function index(DBService $dBService): Response
    {
        $dBService->addSkill("Hello world", "5 years", 5, "Java");
        $dBService->addSkill("Hello world2", "2 years", 3, "C#");

        return new Response("add skills");
    }
}
