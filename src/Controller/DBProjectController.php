<?php

namespace App\Controller;
use App\Entity\Project;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DBProjectController extends AbstractController implements DBControllerInterface
{
    protected array $project_errors = [
        "add_error" => "The project under this git link already exist",
        "remove_error" => "The projects doesn't found" 
    ];

    #[Route('/db/project/add', name: 'app_db_project_add')]
    public function add(EntityManagerInterface $entityManagerInterface): Response
    {   
        if (!array_key_exists("project", $_POST)) return $this->render('db/project/add.html.twig', ['error' => false]);

        $post_project = $_POST['project'];

        if ($entityManagerInterface->getRepository(Project::class)->findBy(["gitPath" => $post_project["gitPath"]])) {
            return $this->render("db/project/add.html.twig", [
                "error_message" => $this->project_errors["add_error"]
            ]);
        }

        $project = new Project();
        $project
            ->setName($post_project["name"])
            ->setLanguage($post_project["language"])
            ->setGitPath($post_project["gitPath"])
            ->setDescription($post_project["description"]);

        $entityManagerInterface->persist($project);
        $entityManagerInterface->flush();

        return $this->render("db/project/add.html.twig", ["post" => $_POST, "project" => $project]);
    }

    #[Route('/db/project/remove', name: 'app_db_project_remove')]
    public function remove(EntityManagerInterface $entityManagerInterface): Response
    {
        if (!array_key_exists("project", $_POST)) return $this->render('db/project/remove.html.twig');
        $project_info = $_POST["project"];

        $projects = $entityManagerInterface->getRepository(Project::class)->findBy($project_info);

        if (!$projects) {
            return $this->render("db/project/remove.html.twig", [
                "error_message" => $this->project_errors['remove_error']
            ]);
        }

        foreach ($projects as $project) {
            $entityManagerInterface->remove($project);
            $entityManagerInterface->flush();
        }
        
        return $this->render("db/project/remove.html.twig", ["projects" => $projects, "sucsess_delete" => true]);
    }

    #[Route('/db/project/list', name: 'app_db_project_list')]
    public function list(EntityManagerInterface $entityManagerInterface): Response
    {
        $projects = $entityManagerInterface->getRepository(Project::class)->findAll();
        
        return $this->render("db/project/list.html.twig", ["projects" => $projects]);
    }
}
