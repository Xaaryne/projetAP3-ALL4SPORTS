<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240120002458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clientsports (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, listesports_id INT DEFAULT NULL, INDEX IDX_5A9C893719EB6921 (client_id), INDEX IDX_5A9C893766A6A12D (listesports_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enfants (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, age INT NOT NULL, INDEX IDX_23E2BAC319EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clientsports ADD CONSTRAINT FK_5A9C893719EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE clientsports ADD CONSTRAINT FK_5A9C893766A6A12D FOREIGN KEY (listesports_id) REFERENCES listesports (id)');
        $this->addSql('ALTER TABLE enfants ADD CONSTRAINT FK_23E2BAC319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE commandes ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_35D4282C19EB6921 ON commandes (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clientsports DROP FOREIGN KEY FK_5A9C893719EB6921');
        $this->addSql('ALTER TABLE clientsports DROP FOREIGN KEY FK_5A9C893766A6A12D');
        $this->addSql('ALTER TABLE enfants DROP FOREIGN KEY FK_23E2BAC319EB6921');
        $this->addSql('DROP TABLE clientsports');
        $this->addSql('DROP TABLE enfants');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C19EB6921');
        $this->addSql('DROP INDEX IDX_35D4282C19EB6921 ON commandes');
        $this->addSql('ALTER TABLE commandes DROP client_id');
    }
}
