<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240119223026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enfants DROP FOREIGN KEY FK_23E2BAC378B2BEB1');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF28BF5C2E6');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2F347EFB');
        $this->addSql('ALTER TABLE photosaccueil DROP FOREIGN KEY FK_99A02C2A690AC5D4');
        $this->addSql('ALTER TABLE lieudisponibilite DROP FOREIGN KEY FK_F793E35620096AE3');
        $this->addSql('ALTER TABLE lieudisponibilite DROP FOREIGN KEY FK_F793E356F347EFB');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY fk_commandes_1');
        $this->addSql('ALTER TABLE photosproduit DROP FOREIGN KEY FK_B29C8CB3F347EFB');
        $this->addSql('ALTER TABLE lieustockage DROP FOREIGN KEY FK_5F706D0E1B75B2A3');
        $this->addSql('ALTER TABLE lieustockage DROP FOREIGN KEY FK_5F706D0E72831E97');
        $this->addSql('ALTER TABLE lieustockage DROP FOREIGN KEY FK_5F706D0EF347EFB');
        $this->addSql('ALTER TABLE lieustockage DROP FOREIGN KEY FK_5F706D0EFF5AB468');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27690AC5D4');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE entrepot');
        $this->addSql('DROP TABLE enfants');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE photosaccueil');
        $this->addSql('DROP TABLE lieudisponibilite');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE photosproduit');
        $this->addSql('DROP TABLE clientsport');
        $this->addSql('DROP TABLE magasin');
        $this->addSql('DROP TABLE lieustockage');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE listesport');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT NOT NULL, nom VARCHAR(55) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, prenom VARCHAR(55) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, mail VARCHAR(60) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, telephone VARCHAR(11) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, code VARCHAR(11) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, nb_enfant INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE entrepot (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE enfants (id INT AUTO_INCREMENT NOT NULL, fk_client_id INT NOT NULL, age INT NOT NULL, INDEX IDX_23E2BAC378B2BEB1 (fk_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, commandes_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_24CC0DF28BF5C2E6 (commandes_id), INDEX IDX_24CC0DF2F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE photosaccueil (id INT AUTO_INCREMENT NOT NULL, listesport_id INT DEFAULT NULL, photos VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_99A02C2A690AC5D4 (listesport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lieudisponibilite (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, magasin_id INT DEFAULT NULL, quantite INT NOT NULL, etagere VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, etage INT DEFAULT NULL, INDEX IDX_F793E35620096AE3 (magasin_id), INDEX IDX_F793E356F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, fk_client INT DEFAULT NULL, date DATE NOT NULL, etat VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prixtotal DOUBLE PRECISION DEFAULT NULL, INDEX fk_commandes_1_idx (fk_client), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE photosproduit (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, photos VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B29C8CB3F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE clientsport (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE magasin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lieustockage (id INT AUTO_INCREMENT NOT NULL, fk_produit_id INT DEFAULT NULL, fk_entrepot_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, entrepot_id INT DEFAULT NULL, quantite INT NOT NULL, etagere VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, etage INT DEFAULT NULL, INDEX IDX_5F706D0E72831E97 (entrepot_id), INDEX IDX_5F706D0EF347EFB (produit_id), INDEX IDX_5F706D0EFF5AB468 (fk_produit_id), INDEX IDX_5F706D0E1B75B2A3 (fk_entrepot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, listesport_id INT DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, description VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, reference VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, fournisseur VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nomproduit VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_29A5EC27690AC5D4 (listesport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE listesport (id INT AUTO_INCREMENT NOT NULL, sport VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE enfants ADD CONSTRAINT FK_23E2BAC378B2BEB1 FOREIGN KEY (fk_client_id) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF28BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commandes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE photosaccueil ADD CONSTRAINT FK_99A02C2A690AC5D4 FOREIGN KEY (listesport_id) REFERENCES listesport (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lieudisponibilite ADD CONSTRAINT FK_F793E35620096AE3 FOREIGN KEY (magasin_id) REFERENCES magasin (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lieudisponibilite ADD CONSTRAINT FK_F793E356F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT fk_commandes_1 FOREIGN KEY (fk_client) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE photosproduit ADD CONSTRAINT FK_B29C8CB3F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lieustockage ADD CONSTRAINT FK_5F706D0E1B75B2A3 FOREIGN KEY (fk_entrepot_id) REFERENCES entrepot (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lieustockage ADD CONSTRAINT FK_5F706D0E72831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lieustockage ADD CONSTRAINT FK_5F706D0EF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lieustockage ADD CONSTRAINT FK_5F706D0EFF5AB468 FOREIGN KEY (fk_produit_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27690AC5D4 FOREIGN KEY (listesport_id) REFERENCES listesport (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
