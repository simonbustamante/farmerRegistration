<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121171350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_farm (product_id INT NOT NULL, farm_id INT NOT NULL, PRIMARY KEY(product_id, farm_id))');
        $this->addSql('CREATE INDEX IDX_D5FEF2E44584665A ON product_farm (product_id)');
        $this->addSql('CREATE INDEX IDX_D5FEF2E465FCFA0D ON product_farm (farm_id)');
        $this->addSql('ALTER TABLE product_farm ADD CONSTRAINT FK_D5FEF2E44584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_farm ADD CONSTRAINT FK_D5FEF2E465FCFA0D FOREIGN KEY (farm_id) REFERENCES farm (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE product_farm');
    }
}
