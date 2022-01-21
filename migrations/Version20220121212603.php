<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121212603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE b2_cproduct_request_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE b2_cproduct_request (id INT NOT NULL, mayani_inventory_id_id INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, quantity_kg DOUBLE PRECISION NOT NULL, total_debt DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1280BBE8B1DC06DF ON b2_cproduct_request (mayani_inventory_id_id)');
        $this->addSql('ALTER TABLE b2_cproduct_request ADD CONSTRAINT FK_1280BBE8B1DC06DF FOREIGN KEY (mayani_inventory_id_id) REFERENCES mayani_product_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE b2_cproduct_request_id_seq CASCADE');
        $this->addSql('DROP TABLE b2_cproduct_request');
    }
}
