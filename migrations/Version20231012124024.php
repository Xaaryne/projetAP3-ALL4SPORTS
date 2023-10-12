<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012124024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieudisponibilite DROP INDEX UNIQ_F793E356FF5AB468, ADD INDEX IDX_F793E356FF5AB468 (fk_produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieudisponibilite DROP INDEX IDX_F793E356FF5AB468, ADD UNIQUE INDEX UNIQ_F793E356FF5AB468 (fk_produit_id)');
    }
}
