<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012113915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE listesport DROP FOREIGN KEY FK_66F75F1AFF5AB468');
        $this->addSql('DROP INDEX IDX_66F75F1AFF5AB468 ON listesport');
        $this->addSql('ALTER TABLE listesport DROP fk_produit_id');
        $this->addSql('ALTER TABLE produit ADD fk_listesport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27D40B016 FOREIGN KEY (fk_listesport_id) REFERENCES listesport (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27D40B016 ON produit (fk_listesport_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE listesport ADD fk_produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE listesport ADD CONSTRAINT FK_66F75F1AFF5AB468 FOREIGN KEY (fk_produit_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_66F75F1AFF5AB468 ON listesport (fk_produit_id)');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27D40B016');
        $this->addSql('DROP INDEX IDX_29A5EC27D40B016 ON produit');
        $this->addSql('ALTER TABLE produit DROP fk_listesport_id');
    }
}
