<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124233739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mayani_request_inventory_mayani_product_inventory (mayani_request_inventory_id INT NOT NULL, mayani_product_inventory_id INT NOT NULL, PRIMARY KEY(mayani_request_inventory_id, mayani_product_inventory_id))');
        $this->addSql('CREATE INDEX IDX_24518E1FE318A92 ON mayani_request_inventory_mayani_product_inventory (mayani_request_inventory_id)');
        $this->addSql('CREATE INDEX IDX_24518E1F98BFF121 ON mayani_request_inventory_mayani_product_inventory (mayani_product_inventory_id)');
        $this->addSql('ALTER TABLE mayani_request_inventory_mayani_product_inventory ADD CONSTRAINT FK_24518E1FE318A92 FOREIGN KEY (mayani_request_inventory_id) REFERENCES mayani_request_inventory (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_request_inventory_mayani_product_inventory ADD CONSTRAINT FK_24518E1F98BFF121 FOREIGN KEY (mayani_product_inventory_id) REFERENCES mayani_product_inventory (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_request_inventory DROP CONSTRAINT fk_b656dac09b7979e');
        $this->addSql('DROP INDEX idx_b656dac09b7979e');
        $this->addSql('ALTER TABLE mayani_request_inventory DROP mayani_product_inventory_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE mayani_request_inventory_mayani_product_inventory');
        $this->addSql('ALTER TABLE mayani_request_inventory ADD mayani_product_inventory_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mayani_request_inventory ADD CONSTRAINT fk_b656dac09b7979e FOREIGN KEY (mayani_product_inventory_id_id) REFERENCES mayani_product_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_b656dac09b7979e ON mayani_request_inventory (mayani_product_inventory_id_id)');
    }
}
