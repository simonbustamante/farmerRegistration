<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121212713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE farmer_balance DROP CONSTRAINT fk_71f57f5a34c1e106');
        $this->addSql('DROP INDEX idx_71f57f5a34c1e106');
        $this->addSql('ALTER TABLE farmer_balance DROP farm_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE farmer_balance ADD farm_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE farmer_balance ADD CONSTRAINT fk_71f57f5a34c1e106 FOREIGN KEY (farm_id_id) REFERENCES farm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_71f57f5a34c1e106 ON farmer_balance (farm_id_id)');
    }
}
