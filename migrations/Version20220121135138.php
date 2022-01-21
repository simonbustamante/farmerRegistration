<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121135138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE farm_group (farm_id INT NOT NULL, group_id INT NOT NULL, PRIMARY KEY(farm_id, group_id))');
        $this->addSql('CREATE INDEX IDX_26453B9465FCFA0D ON farm_group (farm_id)');
        $this->addSql('CREATE INDEX IDX_26453B94FE54D947 ON farm_group (group_id)');
        $this->addSql('ALTER TABLE farm_group ADD CONSTRAINT FK_26453B9465FCFA0D FOREIGN KEY (farm_id) REFERENCES farm (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_group ADD CONSTRAINT FK_26453B94FE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE farm_group');
    }
}
