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

    private function persistAndFlushArray(array $array) {
        foreach ($array as $key => $object) {
            $this->entityManager->persist($object);
        }

        $this->entityManager->flush();
    }

    public function initContact() {
        $this->persistAndFlushArray([
            (new Contact())->setName("LinkedIn")->setContact("https://www.linkedin.com/in/dmytrii-lukiashchenko-490987282/")->setIcon_path("/images/socialmedia/linkedin_icon.png"),
            (new Contact())->setName("GitHub")->setContact("https://github.com/LukiaschenkoDmitriy")->setIcon_path("/images/socialmedia/github.png"),
            (new Contact())->setName("Facebook")->setContact("https://www.facebook.com/dmLukiaschenko/")->setIcon_path("/images/socialmedia/facebook_icon.png"),
            (new Contact())->setName("Phone")->setContact("48883757093")->setIcon_path("/images/socialmedia/telephone_icon.png"),
            (new Contact())->setName("Phone")->setContact("380685224036")->setIcon_path("/images/socialmedia/telephone_icon.png")
        ]);
    }

    public function initLanguages() {
        $this->persistAndFlushArray([
            (new Language())->setName("Ukraine")->setRate(9),
            (new Language())->setName("Polish")->setRate(5),
            (new Language())->setName("English")->setRate(4),
            (new Language())->setName("Russian")->setRate(8)
        ]);
    }

    public function initProjects() {
        $this->persistAndFlushArray([
            (new Project())->setLanguage("PHP")
                           ->setName("Website card")
                           ->setGitPath("https://github.com/LukiaschenkoDmitriy/Site-Card")
                           ->setLanguageLogo("/images/logo/php.png")
                           ->setDescription("The project included the development of my own business card website based on the Symfony framework. Using tools such as Doctrine, SASS, MySQL, and Webpack, The challenges i faced: Webpack and resource optimization, Working with Doctrine and MySQL, Working with SASS"),
            (new Project())->setLanguage("PHP")
                           ->setName("Web chat site")
                           ->setGitPath("https://github.com/LukiaschenkoDmitriy/WChat")
                           ->setLanguageLogo("/images/logo/php.png")
                           ->setDescription("The WChat - Web Chat for School Students project is an innovative platform for simplifying communication among students. Based on Tailwind, SASS, Twig, Webpack, Doctrine, and Scrum technologies, the project offers a highly efficient and intuitive information exchange system.")
        ]);
    }

    public function initSkills() {
        $this->persistAndFlushArray([
            (new Skill())->setName("PHP")->setRate(4)->setBg("images/skill_bg.jpg")->setLogo("images/logo/php.png"),
            (new Skill())->setName("Symfony")->setRate(3)->setBg("images/skill_bg_2.jpg")->setLogo("images/logo/symfony.png"),
            (new Skill())->setName("Doctrine")->setRate(2)->setBg("images/skill_bg_3.jpg")->setLogo("images/logo/doctrine.png"),
            (new Skill())->setName("SASS")->setRate(4)->setBg("images/skill_bg_4.jpg")->setLogo("images/logo/sass.png"),
            (new Skill())->setName("Twig")->setRate(4)->setBg("images/skill_bg_3.jpg")->setLogo("images/logo/twig.png"),
            (new Skill())->setName("TailWind")->setRate(4)->setBg("images/skill_bg.jpg")->setLogo("images/logo/tailwind.png"),
            (new Skill())->setName("Scrum")->setRate(5)->setBg("images/skill_bg_4.jpg")->setLogo("images/logo/scrum.png"),
            (new Skill())->setName("Docker")->setRate(2)->setBg("images/skill_bg_2.jpg")->setLogo("images/logo/docker.png"),
            (new Skill())->setName("Git")->setRate(4)->setBg("images/skill_bg_3.jpg")->setLogo("images/logo/github.png"),
            (new Skill())->setName("React")->setRate(1)->setBg("images/skill_bg.jpg")->setLogo("images/logo/react.png")

        ]);
    }
}