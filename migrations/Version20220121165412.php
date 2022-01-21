<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121165412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE farm_inventory ADD product_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE farm_inventory ADD CONSTRAINT FK_3ACBF98ADE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3ACBF98ADE18E50B ON farm_inventory (product_id_id)');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT fk_d34a04ad432b1a90');
        $this->addSql('DROP INDEX idx_d34a04ad432b1a90');
        $this->addSql('ALTER TABLE product DROP farm_inventory_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE farm_inventory DROP CONSTRAINT FK_3ACBF98ADE18E50B');
        $this->addSql('DROP INDEX UNIQ_3ACBF98ADE18E50B');
        $this->addSql('ALTER TABLE farm_inventory DROP product_id_id');
        $this->addSql('ALTER TABLE product ADD farm_inventory_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT fk_d34a04ad432b1a90 FOREIGN KEY (farm_inventory_id) REFERENCES farm_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_d34a04ad432b1a90 ON product (farm_inventory_id)');
    }
}
