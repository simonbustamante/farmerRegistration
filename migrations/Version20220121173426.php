<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121173426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product_farm');
        $this->addSql('ALTER TABLE product ADD farm_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD34C1E106 FOREIGN KEY (farm_id_id) REFERENCES farm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D34A04AD34C1E106 ON product (farm_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE product_farm (product_id INT NOT NULL, farm_id INT NOT NULL, PRIMARY KEY(product_id, farm_id))');
        $this->addSql('CREATE INDEX idx_d5fef2e465fcfa0d ON product_farm (farm_id)');
        $this->addSql('CREATE INDEX idx_d5fef2e44584665a ON product_farm (product_id)');
        $this->addSql('ALTER TABLE product_farm ADD CONSTRAINT fk_d5fef2e44584665a FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_farm ADD CONSTRAINT fk_d5fef2e465fcfa0d FOREIGN KEY (farm_id) REFERENCES farm (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD34C1E106');
        $this->addSql('DROP INDEX IDX_D34A04AD34C1E106');
        $this->addSql('ALTER TABLE product DROP farm_id_id');
    }
}
