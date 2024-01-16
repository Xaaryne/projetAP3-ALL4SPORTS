<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240116100635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieudisponibilite ADD etagère VARCHAR(255) DEFAULT NULL, ADD etagere VARCHAR(255) DEFAULT NULL, ADD etage INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lieustockage ADD etagere VARCHAR(255) DEFAULT NULL, ADD etage INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieudisponibilite DROP etagère, DROP etagere, DROP etage');
        $this->addSql('ALTER TABLE lieustockage DROP etagere, DROP etage');
    }
}
