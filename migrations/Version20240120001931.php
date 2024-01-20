<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240120001931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, nom VARCHAR(55) NOT NULL, prenom VARCHAR(55) NOT NULL, telephone VARCHAR(11) DEFAULT NULL, datenaissance DATE DEFAULT NULL, nbenfants INT NOT NULL, code VARCHAR(11) NOT NULL, UNIQUE INDEX UNIQ_C7440455E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrepot (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(125) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieudisponibilite (id INT AUTO_INCREMENT NOT NULL, magasin_id INT NOT NULL, produit_id INT DEFAULT NULL, quantite INT DEFAULT NULL, rayon VARCHAR(100) DEFAULT NULL, INDEX IDX_F793E35620096AE3 (magasin_id), INDEX IDX_F793E356F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieuentrepot (id INT AUTO_INCREMENT NOT NULL, entrepot_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, quantite INT DEFAULT NULL, etagere VARCHAR(55) DEFAULT NULL, etage INT DEFAULT NULL, INDEX IDX_4DC9CEC672831E97 (entrepot_id), INDEX IDX_4DC9CEC6F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE magasin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(125) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photosproduit (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, photos VARCHAR(100) DEFAULT NULL, INDEX IDX_B29C8CB3F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lieudisponibilite ADD CONSTRAINT FK_F793E35620096AE3 FOREIGN KEY (magasin_id) REFERENCES magasin (id)');
        $this->addSql('ALTER TABLE lieudisponibilite ADD CONSTRAINT FK_F793E356F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE lieuentrepot ADD CONSTRAINT FK_4DC9CEC672831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id)');
        $this->addSql('ALTER TABLE lieuentrepot ADD CONSTRAINT FK_4DC9CEC6F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE photosproduit ADD CONSTRAINT FK_B29C8CB3F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE listesports ADD photos VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieudisponibilite DROP FOREIGN KEY FK_F793E35620096AE3');
        $this->addSql('ALTER TABLE lieudisponibilite DROP FOREIGN KEY FK_F793E356F347EFB');
        $this->addSql('ALTER TABLE lieuentrepot DROP FOREIGN KEY FK_4DC9CEC672831E97');
        $this->addSql('ALTER TABLE lieuentrepot DROP FOREIGN KEY FK_4DC9CEC6F347EFB');
        $this->addSql('ALTER TABLE photosproduit DROP FOREIGN KEY FK_B29C8CB3F347EFB');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE entrepot');
        $this->addSql('DROP TABLE lieudisponibilite');
        $this->addSql('DROP TABLE lieuentrepot');
        $this->addSql('DROP TABLE magasin');
        $this->addSql('DROP TABLE photosproduit');
        $this->addSql('ALTER TABLE listesports DROP photos');
    }
}
