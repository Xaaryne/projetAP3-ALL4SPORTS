<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240116103326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieudisponibilite DROP FOREIGN KEY FK_F793E356D067A070');
        $this->addSql('ALTER TABLE lieudisponibilite DROP FOREIGN KEY FK_F793E356FF5AB468');
        $this->addSql('DROP INDEX IDX_F793E356FF5AB468 ON lieudisponibilite');
        $this->addSql('DROP INDEX IDX_F793E356D067A070 ON lieudisponibilite');
        $this->addSql('ALTER TABLE lieudisponibilite ADD produit_id INT DEFAULT NULL, ADD magasin_id INT DEFAULT NULL, DROP fk_produit_id, DROP fk_magasin_id');
        $this->addSql('ALTER TABLE lieudisponibilite ADD CONSTRAINT FK_F793E356F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE lieudisponibilite ADD CONSTRAINT FK_F793E35620096AE3 FOREIGN KEY (magasin_id) REFERENCES magasin (id)');
        $this->addSql('CREATE INDEX IDX_F793E356F347EFB ON lieudisponibilite (produit_id)');
        $this->addSql('CREATE INDEX IDX_F793E35620096AE3 ON lieudisponibilite (magasin_id)');
        $this->addSql('ALTER TABLE lieustockage ADD produit_id INT DEFAULT NULL, ADD entrepot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lieustockage ADD CONSTRAINT FK_5F706D0EF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE lieustockage ADD CONSTRAINT FK_5F706D0E72831E97 FOREIGN KEY (entrepot_id) REFERENCES entrepot (id)');
        $this->addSql('CREATE INDEX IDX_5F706D0EF347EFB ON lieustockage (produit_id)');
        $this->addSql('CREATE INDEX IDX_5F706D0E72831E97 ON lieustockage (entrepot_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieudisponibilite DROP FOREIGN KEY FK_F793E356F347EFB');
        $this->addSql('ALTER TABLE lieudisponibilite DROP FOREIGN KEY FK_F793E35620096AE3');
        $this->addSql('DROP INDEX IDX_F793E356F347EFB ON lieudisponibilite');
        $this->addSql('DROP INDEX IDX_F793E35620096AE3 ON lieudisponibilite');
        $this->addSql('ALTER TABLE lieudisponibilite ADD fk_produit_id INT DEFAULT NULL, ADD fk_magasin_id INT DEFAULT NULL, DROP produit_id, DROP magasin_id');
        $this->addSql('ALTER TABLE lieudisponibilite ADD CONSTRAINT FK_F793E356D067A070 FOREIGN KEY (fk_magasin_id) REFERENCES magasin (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lieudisponibilite ADD CONSTRAINT FK_F793E356FF5AB468 FOREIGN KEY (fk_produit_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F793E356FF5AB468 ON lieudisponibilite (fk_produit_id)');
        $this->addSql('CREATE INDEX IDX_F793E356D067A070 ON lieudisponibilite (fk_magasin_id)');
        $this->addSql('ALTER TABLE lieustockage DROP FOREIGN KEY FK_5F706D0EF347EFB');
        $this->addSql('ALTER TABLE lieustockage DROP FOREIGN KEY FK_5F706D0E72831E97');
        $this->addSql('DROP INDEX IDX_5F706D0EF347EFB ON lieustockage');
        $this->addSql('DROP INDEX IDX_5F706D0E72831E97 ON lieustockage');
        $this->addSql('ALTER TABLE lieustockage DROP produit_id, DROP entrepot_id');
    }
}
