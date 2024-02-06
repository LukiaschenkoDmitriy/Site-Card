<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Language;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Project;
use App\Entity\Skill;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index', methods:"GET")]
    public function index(EntityManagerInterface $entityManagerInterface): Response
    {
        $skills = $entityManagerInterface->getRepository(Skill::class)->findAll();
        $projects = $entityManagerInterface->getRepository(Project::class)->findAll();
        $languages = $entityManagerInterface->getRepository(Language::class)->findAll();
        $contacts = $entityManagerInterface->getRepository(Contact::class)->findAll();

        return $this->render("index/index.html.twig", [
            'skills' => $skills, 
            'projects' => $projects,
            "languages" => $languages,
            "contacts" => $contacts
        ]);
    }

    #[Route("/send-mail", methods:"POST", name:"app_mail")]
    public function mail(Request $request, MailerInterface $mailerInterface): Response {
        if ($request->isMethod("POST")) {
            $name = $request->request->get("name");
            $email = $request->request->get("email");
            $theme = $request->request->get("theme");
            $message = $request->request->get("message");

            $email = (new Email())
                    ->from($email)
                    ->to("lukiaschenkoff@gmail.com")
                    ->priority(Email::PRIORITY_HIGHEST)
                    ->subject("[Site Card]".$theme)
                    ->html("<div>".$name."</div>"."<div>".$message."</div>");

            $mailerInterface->send($email);
        }
        return $this->redirectToRoute("app_index");
    }
}
