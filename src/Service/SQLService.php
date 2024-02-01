<?php

namespace App\Service;

use App\Entity\Contact;
use App\Entity\Language;
use App\Entity\Project;
use App\Entity\Skill;
use Doctrine\ORM\EntityManagerInterface;

class SQLService {

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    private function addAndPersistArray(array $array) {
        foreach ($array as $key => $object) {
            $this->entityManager->persist($object);
        }

        $this->entityManager->flush();
    }

    public function initContact() {
        $this->addAndPersistArray([
            (new Contact())->setName("Linkedin: ")
                           ->setContact("https://www.linkedin.com/in/dmytrii-lukiashchenko-490987282/")
                           ->setIcon_path("/images/socialmedia/linkedin_icon.png"),
        ]);
    }

    public function initLanguages() {
        $this->addAndPersistArray([
            (new Language())->setName("Ukraine")->setRate(5),
            (new Language())->setName("Polish")->setRate(3),
            (new Language())->setName("English")->setRate(2)
        ]);
    }

    public function initProjects() {
        $this->addAndPersistArray([
            (new Project())->setLanguage("PHP")
                           ->setName("Website card")
                           ->setGit_path("https://github.com/LukiaschenkoDmitriy/Site-Card")
                           ->setDescription("The project included the development of my own business card website based on the Symfony framework, which allowed me to present my skills and services in the field of web development. Using tools such as Doctrine, SASS, MySQL, and Webpack, I created a highly efficient and stylish website. The challenges I faced: Webpack and resource optimization, Working with Doctrine and MySQL, Working with SASS"),
            (new Project())->setLanguage("PHP")
                           ->setName("Web chat site")
                           ->setGit_path("https://github.com/LukiaschenkoDmitriy/WChat")
                           ->setDescription("The WChat - Web Chat for School Students project is an innovative platform for simplifying communication among students. Based on Tailwind, SASS, Twig, Webpack, Doctrine, and Scrum technologies, the project offers a highly efficient and intuitive information exchange system.")
        ]);
    }

    public function initSkills() {
        $this->addAndPersistArray([
            (new Skill())->setName("PHP")->setRate(3)->setDescription("helloworld"),
            (new Skill())->setName("Symfony")->setRate(2)->setDescription(""),
            (new Skill())->setName("Doctrine")->setRate(2)->setDescription(""),
            (new Skill())->setName("SASS")->setRate(2)->setDescription(""),
            (new Skill())->setName("Twig")->setRate(2)->setDescription(""),
            (new Skill())->setName("TailWind")->setRate(2)->setDescription(""),
            (new Skill())->setName("Scrum")->setRate(3)->setDescription(""),
            (new Skill())->setName("Docker")->setRate(1)->setDescription(""),
            (new Skill())->setName(("Git"))->setRate(3)->setDescription(""),
            (new Skill())->setName("React")->setRate(1)->setDescription("")

        ]);
    }
}