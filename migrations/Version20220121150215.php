<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121150215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE farm_activity (farm_id INT NOT NULL, activity_id INT NOT NULL, PRIMARY KEY(farm_id, activity_id))');
        $this->addSql('CREATE INDEX IDX_F47F5F0065FCFA0D ON farm_activity (farm_id)');
        $this->addSql('CREATE INDEX IDX_F47F5F0081C06096 ON farm_activity (activity_id)');
        $this->addSql('ALTER TABLE farm_activity ADD CONSTRAINT FK_F47F5F0065FCFA0D FOREIGN KEY (farm_id) REFERENCES farm (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_activity ADD CONSTRAINT FK_F47F5F0081C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE farm_activity');
    }
}
