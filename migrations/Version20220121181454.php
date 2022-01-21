<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121181454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inventory_update ADD quantity_kg DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE inventory_update ADD credit DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE inventory_update ADD date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE inventory_update DROP quantity_kg');
        $this->addSql('ALTER TABLE inventory_update DROP credit');
        $this->addSql('ALTER TABLE inventory_update DROP date');
    }
}
