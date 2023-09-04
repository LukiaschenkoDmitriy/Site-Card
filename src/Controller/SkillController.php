<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Project;
use App\Entity\Skill;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SkillController extends AbstractController
{
    #[Route('/skill/{skillName}', name: 'app_skill')]
    public function index(String $skillName, EntityManagerInterface $entityManagerInterface): Response
    {
        $contacts = $entityManagerInterface->getRepository(Contact::class)->findAll();

        $projects = $entityManagerInterface->getRepository(Project::class)->findAll();
        $skill = $entityManagerInterface->getRepository(Skill::class)->findOneBy(["project_language" => $skillName]);
        if ($skill == null) return new Response("Doesn't skill exist");

        return $this->render("/skill/index.html.twig", [
            "skill" => $skill,
            "projects" => $projects,
            "contacts" => $contacts
        ]);
    }
}
