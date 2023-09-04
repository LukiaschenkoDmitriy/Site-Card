<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function index(EntityManagerInterface $entityManagerInterface): Response
    {
        $contacts = $entityManagerInterface->getRepository(Contact::class)->findAll();

        return $this->render("/about/index.html.twig", [
            "contacts" => $contacts
        ]);
    }
}
