<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240115191849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2AA28C0FF');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2FF5AB468');
        $this->addSql('DROP INDEX IDX_24CC0DF2FF5AB468 ON panier');
        $this->addSql('DROP INDEX IDX_24CC0DF2AA28C0FF ON panier');
        $this->addSql('ALTER TABLE panier ADD commandes_id INT DEFAULT NULL, ADD produit_id INT DEFAULT NULL, DROP fk_commandes_id, DROP fk_produit_id');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF28BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_24CC0DF28BF5C2E6 ON panier (commandes_id)');
        $this->addSql('CREATE INDEX IDX_24CC0DF2F347EFB ON panier (produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF28BF5C2E6');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2F347EFB');
        $this->addSql('DROP INDEX IDX_24CC0DF28BF5C2E6 ON panier');
        $this->addSql('DROP INDEX IDX_24CC0DF2F347EFB ON panier');
        $this->addSql('ALTER TABLE panier ADD fk_commandes_id INT NOT NULL, ADD fk_produit_id INT NOT NULL, DROP commandes_id, DROP produit_id');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2AA28C0FF FOREIGN KEY (fk_commandes_id) REFERENCES commandes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2FF5AB468 FOREIGN KEY (fk_produit_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_24CC0DF2FF5AB468 ON panier (fk_produit_id)');
        $this->addSql('CREATE INDEX IDX_24CC0DF2AA28C0FF ON panier (fk_commandes_id)');
    }
}
