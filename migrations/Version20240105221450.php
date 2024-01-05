<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240105221450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes CHANGE fk_client_id fk_client_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX reference_UNIQUE ON produit');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes CHANGE fk_client_id fk_client_id INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX reference_UNIQUE ON produit (reference)');
    }
}
