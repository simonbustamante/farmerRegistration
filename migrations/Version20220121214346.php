<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121214346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE farmer_balance_farmer_loans (farmer_balance_id INT NOT NULL, farmer_loans_id INT NOT NULL, PRIMARY KEY(farmer_balance_id, farmer_loans_id))');
        $this->addSql('CREATE INDEX IDX_F6FB1284621A0D8D ON farmer_balance_farmer_loans (farmer_balance_id)');
        $this->addSql('CREATE INDEX IDX_F6FB12844BDE3683 ON farmer_balance_farmer_loans (farmer_loans_id)');
        $this->addSql('ALTER TABLE farmer_balance_farmer_loans ADD CONSTRAINT FK_F6FB1284621A0D8D FOREIGN KEY (farmer_balance_id) REFERENCES farmer_balance (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farmer_balance_farmer_loans ADD CONSTRAINT FK_F6FB12844BDE3683 FOREIGN KEY (farmer_loans_id) REFERENCES farmer_loans (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE farmer_balance_farmer_loans');
    }
}
