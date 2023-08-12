<?php

namespace App\Controller;
use App\Entity\Skill;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DBSkillController extends AbstractController implements DBControllerInterface
{
    protected array $skill_errors = [
        "add_error" => "The skill under this name already exist",
        "remove_error" => "The skill doesn't found" 
    ];

    #[Route('/db/skill/add', name: 'app_db_skill_add')]
    public function add(EntityManagerInterface $entityManagerInterface): Response
    {   
        if (!array_key_exists("skill", $_POST)) return $this->render('db/skill/add.html.twig', ['error' => false]);

        $post_skill = $_POST['skill'];

        if ($entityManagerInterface->getRepository(Skill::class)->findBy(["name" => $post_skill["name"]])) {
            return $this->render("db/skill/add.html.twig", [
                "error_message" => $this->skill_errors["add_error"]
            ]);
        }

        $skill = new Skill();
        $skill
            ->setName($post_skill["name"])
            ->setDuration($post_skill["duration"])
            ->setprojectLanguage($post_skill["projectLanguage"])
            ->setRate($post_skill["rate"]);

        $entityManagerInterface->persist($skill);
        $entityManagerInterface->flush();

        return $this->render("db/skill/add.html.twig", ["post" => $_POST, "skill" => $skill]);
    }

    #[Route('/db/skill/remove', name: 'app_db_skill_remove')]
    public function remove(EntityManagerInterface $entityManagerInterface): Response
    {
        if (!array_key_exists("skill", $_POST)) return $this->render('db/skill/remove.html.twig');
        $postSkill = $_POST["skill"];

        $skills = $entityManagerInterface->getRepository(Skill::class)->findBy($postSkill);

        if (!$skills) {
            return $this->render("db/skill/remove.html.twig", [
                "error_message" => $this->skill_errors['remove_error']
            ]);
        }

        foreach ($skills as $skill) {
            $entityManagerInterface->remove($skill);
            $entityManagerInterface->flush();
        }
        
        return $this->render("db/skill/remove.html.twig", ["skills" => $skills, "sucsess_delete" => true]);
    }

    #[Route('/db/skill/list', name: 'app_db_skill_list')]
    public function list(EntityManagerInterface $entityManagerInterface): Response
    {
        $skills = $entityManagerInterface->getRepository(Skill::class)->findAll();
        
        return $this->render("db/skill/list.html.twig", ["skills" => $skills]);
    }
}
