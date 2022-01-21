<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121160856 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD activity_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD kg_per_month DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD6146A8E4 FOREIGN KEY (activity_id_id) REFERENCES activity (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D34A04AD6146A8E4 ON product (activity_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD6146A8E4');
        $this->addSql('DROP INDEX IDX_D34A04AD6146A8E4');
        $this->addSql('ALTER TABLE product DROP activity_id_id');
        $this->addSql('ALTER TABLE product DROP kg_per_month');
    }
}
