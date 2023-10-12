<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231006082900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entrepot DROP FOREIGN KEY FK_D805175A352AD886');
        $this->addSql('DROP INDEX IDX_D805175A352AD886 ON entrepot');
        $this->addSql('ALTER TABLE entrepot DROP fk_lieustockage_id');
        $this->addSql('ALTER TABLE lieudisponibilite ADD fk_produit_id INT NOT NULL, ADD fk_magasin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lieudisponibilite ADD CONSTRAINT FK_F793E356FF5AB468 FOREIGN KEY (fk_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE lieudisponibilite ADD CONSTRAINT FK_F793E356D067A070 FOREIGN KEY (fk_magasin_id) REFERENCES magasin (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F793E356FF5AB468 ON lieudisponibilite (fk_produit_id)');
        $this->addSql('CREATE INDEX IDX_F793E356D067A070 ON lieudisponibilite (fk_magasin_id)');
        $this->addSql('ALTER TABLE lieustockage ADD fk_produit_id INT DEFAULT NULL, ADD fk_entrepot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lieustockage ADD CONSTRAINT FK_5F706D0EFF5AB468 FOREIGN KEY (fk_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE lieustockage ADD CONSTRAINT FK_5F706D0E1B75B2A3 FOREIGN KEY (fk_entrepot_id) REFERENCES entrepot (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5F706D0EFF5AB468 ON lieustockage (fk_produit_id)');
        $this->addSql('CREATE INDEX IDX_5F706D0E1B75B2A3 ON lieustockage (fk_entrepot_id)');
        $this->addSql('ALTER TABLE magasin DROP FOREIGN KEY FK_54AF5F27B44FC778');
        $this->addSql('DROP INDEX IDX_54AF5F27B44FC778 ON magasin');
        $this->addSql('ALTER TABLE magasin DROP fk_lieudisponibilite_id');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27352AD886');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27B44FC778');
        $this->addSql('DROP INDEX IDX_29A5EC27B44FC778 ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC27352AD886 ON produit');
        $this->addSql('ALTER TABLE produit DROP fk_lieudisponibilite_id, DROP fk_lieustockage_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entrepot ADD fk_lieustockage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entrepot ADD CONSTRAINT FK_D805175A352AD886 FOREIGN KEY (fk_lieustockage_id) REFERENCES lieustockage (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D805175A352AD886 ON entrepot (fk_lieustockage_id)');
        $this->addSql('ALTER TABLE magasin ADD fk_lieudisponibilite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE magasin ADD CONSTRAINT FK_54AF5F27B44FC778 FOREIGN KEY (fk_lieudisponibilite_id) REFERENCES lieudisponibilite (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_54AF5F27B44FC778 ON magasin (fk_lieudisponibilite_id)');
        $this->addSql('ALTER TABLE lieudisponibilite DROP FOREIGN KEY FK_F793E356FF5AB468');
        $this->addSql('ALTER TABLE lieudisponibilite DROP FOREIGN KEY FK_F793E356D067A070');
        $this->addSql('DROP INDEX UNIQ_F793E356FF5AB468 ON lieudisponibilite');
        $this->addSql('DROP INDEX IDX_F793E356D067A070 ON lieudisponibilite');
        $this->addSql('ALTER TABLE lieudisponibilite DROP fk_produit_id, DROP fk_magasin_id');
        $this->addSql('ALTER TABLE lieustockage DROP FOREIGN KEY FK_5F706D0EFF5AB468');
        $this->addSql('ALTER TABLE lieustockage DROP FOREIGN KEY FK_5F706D0E1B75B2A3');
        $this->addSql('DROP INDEX UNIQ_5F706D0EFF5AB468 ON lieustockage');
        $this->addSql('DROP INDEX IDX_5F706D0E1B75B2A3 ON lieustockage');
        $this->addSql('ALTER TABLE lieustockage DROP fk_produit_id, DROP fk_entrepot_id');
        $this->addSql('ALTER TABLE produit ADD fk_lieudisponibilite_id INT DEFAULT NULL, ADD fk_lieustockage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27352AD886 FOREIGN KEY (fk_lieustockage_id) REFERENCES lieustockage (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27B44FC778 FOREIGN KEY (fk_lieudisponibilite_id) REFERENCES lieudisponibilite (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_29A5EC27B44FC778 ON produit (fk_lieudisponibilite_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27352AD886 ON produit (fk_lieustockage_id)');
    }
}
