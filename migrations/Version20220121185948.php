<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121185948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE mayani_request_inventory_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE mayani_request_inventory (id INT NOT NULL, inventory_id_id INT DEFAULT NULL, quantity_kg DOUBLE PRECISION NOT NULL, debt DOUBLE PRECISION NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B656DAC0A3D83557 ON mayani_request_inventory (inventory_id_id)');
        $this->addSql('ALTER TABLE mayani_request_inventory ADD CONSTRAINT FK_B656DAC0A3D83557 FOREIGN KEY (inventory_id_id) REFERENCES farm_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE mayani_request_inventory_id_seq CASCADE');
        $this->addSql('DROP TABLE mayani_request_inventory');
    }
}
