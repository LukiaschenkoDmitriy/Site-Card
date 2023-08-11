<?php

namespace App\Controller;
use App\Entity\Project;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DBProjectController extends AbstractController
{
    #[Route('/db/project/add', name: 'app_db_project_add')]
    public function add(EntityManagerInterface $entityManagerInterface): Response
    {   
        if (array_key_exists("project", $_POST)) {
            $name = $_POST['project']['name'];
            $language = $_POST['project']['language'];
            $gitPath = $_POST['project']['gitPath'];
            $description = $_POST['project']['description'];

            if ($entityManagerInterface->getRepository(Project::class)->findBy(["gitPath" => $gitPath])) {
                return $this->render("db/project/add.html.twig", [
                    "error_message" => "The project under this git link already exist"
                ]);
            }

            $project = new Project();
            $project
                ->setName($name)
                ->setLanguage($language)
                ->setGitPath($gitPath)
                ->setDescription($description);

            $entityManagerInterface->persist($project);
            $entityManagerInterface->flush();

            return $this->render("db/project/add.html.twig", ["post" => $_POST, "project" => $project]);
        }
        return $this->render('db/project/add.html.twig', ['error' => false]);
    }

    #[Route('/db/project/remove', name: 'app_db_project_remove')]
    public function remove(EntityManagerInterface $entityManagerInterface): Response
    {
        if (array_key_exists("project", $_POST)) {
            $project_info = $_POST["project"];

            $projects = $entityManagerInterface->getRepository(Project::class)->findBy($project_info);

            if (!$projects) {
                return $this->render("db/project/remove.html.twig", [
                    "error_message" => "The projects doesn't found"
                ]);
            }

            foreach ($projects as $project) {
                $entityManagerInterface->remove($project);
                $entityManagerInterface->flush();
            }
            
            return $this->render("db/project/remove.html.twig", ["projects" => $projects, "sucsess_delete" => true]);
        }
        return $this->render('db/project/remove.html.twig');
    }

    #[Route('/db/project/list', name: 'app_db_project_list')]
    public function list(EntityManagerInterface $entityManagerInterface): Response
    {
        $projects = $entityManagerInterface->getRepository(Project::class)->findAll();
        
        return $this->render("db/project/list.html.twig", ["projects" => $projects]);
    }
}
