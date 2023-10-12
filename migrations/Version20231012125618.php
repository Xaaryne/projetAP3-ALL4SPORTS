<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012125618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieustockage DROP INDEX UNIQ_5F706D0EFF5AB468, ADD INDEX IDX_5F706D0EFF5AB468 (fk_produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieustockage DROP INDEX IDX_5F706D0EFF5AB468, ADD UNIQUE INDEX UNIQ_5F706D0EFF5AB468 (fk_produit_id)');
    }
}
