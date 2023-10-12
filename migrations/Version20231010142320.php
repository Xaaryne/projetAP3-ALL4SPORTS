<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231010142320 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455EB1C8260');
        $this->addSql('DROP INDEX IDX_C7440455EB1C8260 ON client');
        $this->addSql('ALTER TABLE client DROP fk_commande_id');
        $this->addSql('ALTER TABLE commandes ADD fk_client_id INT NOT NULL, ADD prixtotal DOUBLE PRECISION DEFAULT NULL, DROP prix');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C78B2BEB1 FOREIGN KEY (fk_client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_35D4282C78B2BEB1 ON commandes (fk_client_id)');
        $this->addSql('ALTER TABLE produit ADD nomproduit VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD fk_commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455EB1C8260 FOREIGN KEY (fk_commande_id) REFERENCES commandes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C7440455EB1C8260 ON client (fk_commande_id)');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C78B2BEB1');
        $this->addSql('DROP INDEX IDX_35D4282C78B2BEB1 ON commandes');
        $this->addSql('ALTER TABLE commandes ADD prix DOUBLE PRECISION NOT NULL, DROP fk_client_id, DROP prixtotal');
        $this->addSql('ALTER TABLE produit DROP nomproduit');
    }
}
