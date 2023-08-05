<?php

namespace App\Controller;

use App\Service\DBService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddProjectController extends AbstractController
{
    #[Route('/add/project', name: 'app_add_project')]
    public function index(DBService $dBService): Response
    {
        $dBService->addProject("Java", "Pomodoro", "", "des");
        $dBService->addProject("Java", "LSD", "", "des");

        return new Response("Good project");
    }
}
