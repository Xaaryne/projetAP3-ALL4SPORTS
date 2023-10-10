<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231005141344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, fk_commande_id INT DEFAULT NULL, nom VARCHAR(55) NOT NULL, prenom VARCHAR(55) NOT NULL, mail VARCHAR(60) NOT NULL, telephone VARCHAR(11) NOT NULL, date_naissance DATE NOT NULL, code VARCHAR(11) NOT NULL, nb_enfant INT DEFAULT NULL, INDEX IDX_C7440455EB1C8260 (fk_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clientsport (id INT AUTO_INCREMENT NOT NULL, fk_client_id INT NOT NULL, fk_listesport_id INT NOT NULL, INDEX IDX_963C5CAB78B2BEB1 (fk_client_id), INDEX IDX_963C5CABD40B016 (fk_listesport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, prix DOUBLE PRECISION NOT NULL, etat VARCHAR(55) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enfants (id INT AUTO_INCREMENT NOT NULL, fk_client_id INT NOT NULL, age INT NOT NULL, INDEX IDX_23E2BAC378B2BEB1 (fk_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrepot (id INT AUTO_INCREMENT NOT NULL, fk_lieustockage_id INT DEFAULT NULL, nom VARCHAR(55) NOT NULL, INDEX IDX_D805175A352AD886 (fk_lieustockage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieudisponibilite (id INT AUTO_INCREMENT NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieustockage (id INT AUTO_INCREMENT NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE listesport (id INT AUTO_INCREMENT NOT NULL, fk_produit_id INT DEFAULT NULL, sport VARCHAR(55) NOT NULL, INDEX IDX_66F75F1AFF5AB468 (fk_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE magasin (id INT AUTO_INCREMENT NOT NULL, fk_lieudisponibilite_id INT DEFAULT NULL, nom VARCHAR(55) NOT NULL, INDEX IDX_54AF5F27B44FC778 (fk_lieudisponibilite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, fk_commandes_id INT NOT NULL, fk_produit_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_24CC0DF2AA28C0FF (fk_commandes_id), INDEX IDX_24CC0DF2FF5AB468 (fk_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photos (id INT AUTO_INCREMENT NOT NULL, photo VARCHAR(250) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, fk_lieudisponibilite_id INT DEFAULT NULL, fk_lieustockage_id INT DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, description VARCHAR(150) NOT NULL, reference VARCHAR(55) NOT NULL, fournisseur VARCHAR(55) NOT NULL, INDEX IDX_29A5EC27B44FC778 (fk_lieudisponibilite_id), INDEX IDX_29A5EC27352AD886 (fk_lieustockage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455EB1C8260 FOREIGN KEY (fk_commande_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE clientsport ADD CONSTRAINT FK_963C5CAB78B2BEB1 FOREIGN KEY (fk_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE clientsport ADD CONSTRAINT FK_963C5CABD40B016 FOREIGN KEY (fk_listesport_id) REFERENCES listesport (id)');
        $this->addSql('ALTER TABLE enfants ADD CONSTRAINT FK_23E2BAC378B2BEB1 FOREIGN KEY (fk_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE entrepot ADD CONSTRAINT FK_D805175A352AD886 FOREIGN KEY (fk_lieustockage_id) REFERENCES lieustockage (id)');
        $this->addSql('ALTER TABLE listesport ADD CONSTRAINT FK_66F75F1AFF5AB468 FOREIGN KEY (fk_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE magasin ADD CONSTRAINT FK_54AF5F27B44FC778 FOREIGN KEY (fk_lieudisponibilite_id) REFERENCES lieudisponibilite (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2AA28C0FF FOREIGN KEY (fk_commandes_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2FF5AB468 FOREIGN KEY (fk_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27B44FC778 FOREIGN KEY (fk_lieudisponibilite_id) REFERENCES lieudisponibilite (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27352AD886 FOREIGN KEY (fk_lieustockage_id) REFERENCES lieustockage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455EB1C8260');
        $this->addSql('ALTER TABLE clientsport DROP FOREIGN KEY FK_963C5CAB78B2BEB1');
        $this->addSql('ALTER TABLE clientsport DROP FOREIGN KEY FK_963C5CABD40B016');
        $this->addSql('ALTER TABLE enfants DROP FOREIGN KEY FK_23E2BAC378B2BEB1');
        $this->addSql('ALTER TABLE entrepot DROP FOREIGN KEY FK_D805175A352AD886');
        $this->addSql('ALTER TABLE listesport DROP FOREIGN KEY FK_66F75F1AFF5AB468');
        $this->addSql('ALTER TABLE magasin DROP FOREIGN KEY FK_54AF5F27B44FC778');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2AA28C0FF');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2FF5AB468');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27B44FC778');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27352AD886');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE clientsport');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE enfants');
        $this->addSql('DROP TABLE entrepot');
        $this->addSql('DROP TABLE lieudisponibilite');
        $this->addSql('DROP TABLE lieustockage');
        $this->addSql('DROP TABLE listesport');
        $this->addSql('DROP TABLE magasin');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE photos');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
