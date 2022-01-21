<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121160218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE farm_inventory ADD farm_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE farm_inventory ADD date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE farm_inventory ADD total_price DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE farm_inventory ADD total_kg DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE farm_inventory ADD CONSTRAINT FK_3ACBF98A34C1E106 FOREIGN KEY (farm_id_id) REFERENCES farm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_3ACBF98A34C1E106 ON farm_inventory (farm_id_id)');
        $this->addSql('ALTER TABLE product ADD farm_inventory_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD432B1A90 FOREIGN KEY (farm_inventory_id) REFERENCES farm_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D34A04AD432B1A90 ON product (farm_inventory_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD432B1A90');
        $this->addSql('DROP INDEX IDX_D34A04AD432B1A90');
        $this->addSql('ALTER TABLE product DROP farm_inventory_id');
        $this->addSql('ALTER TABLE farm_inventory DROP CONSTRAINT FK_3ACBF98A34C1E106');
        $this->addSql('DROP INDEX IDX_3ACBF98A34C1E106');
        $this->addSql('ALTER TABLE farm_inventory DROP farm_id_id');
        $this->addSql('ALTER TABLE farm_inventory DROP date');
        $this->addSql('ALTER TABLE farm_inventory DROP total_price');
        $this->addSql('ALTER TABLE farm_inventory DROP total_kg');
    }
}
