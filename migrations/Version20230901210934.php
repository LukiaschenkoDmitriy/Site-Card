<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230901210934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact ADD contact VARCHAR(255) NOT NULL, ADD additional_contact VARCHAR(255) NOT NULL, DROP contact_1, DROP contact_2');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact ADD contact_1 VARCHAR(255) NOT NULL, ADD contact_2 VARCHAR(255) NOT NULL, DROP contact, DROP additional_contact');
    }
}
