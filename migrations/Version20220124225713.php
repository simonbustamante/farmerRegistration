<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124225713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mayani_request_inventory_farm_inventory (mayani_request_inventory_id INT NOT NULL, farm_inventory_id INT NOT NULL, PRIMARY KEY(mayani_request_inventory_id, farm_inventory_id))');
        $this->addSql('CREATE INDEX IDX_263DC58FE318A92 ON mayani_request_inventory_farm_inventory (mayani_request_inventory_id)');
        $this->addSql('CREATE INDEX IDX_263DC58F432B1A90 ON mayani_request_inventory_farm_inventory (farm_inventory_id)');
        $this->addSql('ALTER TABLE mayani_request_inventory_farm_inventory ADD CONSTRAINT FK_263DC58FE318A92 FOREIGN KEY (mayani_request_inventory_id) REFERENCES mayani_request_inventory (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_request_inventory_farm_inventory ADD CONSTRAINT FK_263DC58F432B1A90 FOREIGN KEY (farm_inventory_id) REFERENCES farm_inventory (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_request_inventory DROP CONSTRAINT fk_b656dac0a3d83557');
        $this->addSql('DROP INDEX idx_b656dac0a3d83557');
        $this->addSql('ALTER TABLE mayani_request_inventory DROP inventory_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE mayani_request_inventory_farm_inventory');
        $this->addSql('ALTER TABLE mayani_request_inventory ADD inventory_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mayani_request_inventory ADD CONSTRAINT fk_b656dac0a3d83557 FOREIGN KEY (inventory_id_id) REFERENCES farm_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_b656dac0a3d83557 ON mayani_request_inventory (inventory_id_id)');
    }
}
