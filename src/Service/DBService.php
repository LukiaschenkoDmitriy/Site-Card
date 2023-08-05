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
            $this->loggerInterface->error("This project already exists!");
            return false;
        }

        $errors = $this->validatorInterface->validate($project);
        if (count($errors) > 0) {
            $this->loggerInterface->error((string) $errors);
            return false;
        }

        $this->entityManagerInterface->persist($project);
        $this->entityManagerInterface->flush();

        $loggerMessage = "A new component 'Project' was added to the 
        database with the parameters 
        'language' => '".$nameLanguage."', 
        'name' => '".$nameProject."',
        'gitPath' => '".$gitPath."'";

        $this->loggerInterface->info($loggerMessage);

        return true;
    }

    public function removeProject(int $id): bool {
        $project = $this->entityManagerInterface->getRepository(Project::class)->find($id);

        if (!$project) {
            $this->loggerInterface->error("No project found for id ".$id);
            return false;
        }

        $this->entityManagerInterface->remove($project);
        $this->entityManagerInterface->flush();
        return true;
    }

    public function addSkill(String $name, string $duration, int $rate, string $project_language) {
        $skill = new Skill();
        $skill->setName($name);
        $skill->setDuration($duration);
        $skill->setRate($rate);
        $skill->setProjectsLanguage($project_language);

        $exist_skill = $this->entityManagerInterface->getRepository(Skill::class)->findOneBy(["name" => $name]);

        if ($exist_skill) {
            $this->loggerInterface->error("This skill already exists!");
            return false;
        }

        $errors = $this->validatorInterface->validate($skill);
        if (count($errors) > 0) {
            $this->loggerInterface->error((string) $errors);
            return false;
        }

        $this->entityManagerInterface->persist($skill);
        $this->entityManagerInterface->flush();

        $loggerMessage = "A new component 'Skill' was added to the 
        database with the parameters 
        'name' => '".$name."', 
        'duration' => '".$duration."',
        'project_language' => '".$project_language."',
        'rate' => '".$rate."'";

        $this->loggerInterface->info($loggerMessage);

        return true;
    }

    public function removeSkill(int $id): bool {
        $project = $this->entityManagerInterface->getRepository(Skill::class)->find($id);

        if (!$project) {
            $this->loggerInterface->error("No skill found for id ".$id);
            return false;
        }

        $this->entityManagerInterface->remove($project);
        $this->entityManagerInterface->flush();
        return true;
    }
}