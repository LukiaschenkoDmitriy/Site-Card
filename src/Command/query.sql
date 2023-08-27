insert into skill
(
    name,
    icon_path,
    hljs_tag,
    base_description,
    code
) values
(
    "PHP",
    "\\images\\php_icon.png",
    "language-php",
    "I have been actively immersed in the world of PHP for a year, learning this powerful programming language and its ecosystem. In this journey, I have gone through many tutorials and hands-on assignments, deepening my knowledge of PHP syntax and key concepts. 
My PHP experience is still limited, but it has already allowed me to realize one project that stands out in particular - a portfolio website built using the Symfony framework. This experience has been important to me as it has allowed me to put what I have learned into practice and understand how PHP can be used to develop dynamic web applications.
The features of Symfony, such as its modular structure, routing system and user-friendly database management, I was able to take advantage of when building my portfolio site, which allowed me to develop a quality web application quickly and efficiently.
My confidence in PHP is constantly growing, and I aim to deepen my skills so that I can create more complex and useful web applications in the future. This experience also motivates me to learn new tools and frameworks to expand my technology stack and become a more skilled web developer.",
"
<?php

namespace App\Service;

use App\Entity\Project;
use App\Entity\Skill;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DBService {
    public function __construct(
        private LoggerInterface $loggerInterface,
        private ValidatorInterface $validatorInterface,
        private EntityManagerInterface $entityManagerInterface
    ) {

    }

    public function addProject(String $nameLanguage, String $nameProject, String $gitPath, String $description): bool
    {
        $project = new Project();
        $project->setLanguage($nameLanguage);
        $project->setName($nameProject);
        $project->setGitPath($gitPath);
        $project->setDescription($description);

        $exist_project = $this->entityManagerInterface->getRepository(Project::class)->findOneBy(['name' => $nameProject]);

        if ($exist_project) {
            $this->loggerInterface->error('This project already exists!');
            return false;
        }

        $errors = $this->validatorInterface->validate($project);
        if (count($errors) > 0) {
            $this->loggerInterface->error((string) $errors);
            return false;
        }

        $this->entityManagerInterface->persist($project);
        $this->entityManagerInterface->flush();
        ...
    ...
...
"
)