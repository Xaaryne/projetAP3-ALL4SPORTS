<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114132710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photosaccueil ADD listesport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photosaccueil ADD CONSTRAINT FK_99A02C2A690AC5D4 FOREIGN KEY (listesport_id) REFERENCES listesport (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_99A02C2A690AC5D4 ON photosaccueil (listesport_id)');
        $this->addSql('ALTER TABLE photosproduit ADD produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photosproduit ADD CONSTRAINT FK_B29C8CB3F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_B29C8CB3F347EFB ON photosproduit (produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photosaccueil DROP FOREIGN KEY FK_99A02C2A690AC5D4');
        $this->addSql('DROP INDEX UNIQ_99A02C2A690AC5D4 ON photosaccueil');
        $this->addSql('ALTER TABLE photosaccueil DROP listesport_id');
        $this->addSql('ALTER TABLE photosproduit DROP FOREIGN KEY FK_B29C8CB3F347EFB');
        $this->addSql('DROP INDEX IDX_B29C8CB3F347EFB ON photosproduit');
        $this->addSql('ALTER TABLE photosproduit DROP produit_id');
    }
}
