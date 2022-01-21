<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121190131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mayani_request_inventory_farmer_balance (mayani_request_inventory_id INT NOT NULL, farmer_balance_id INT NOT NULL, PRIMARY KEY(mayani_request_inventory_id, farmer_balance_id))');
        $this->addSql('CREATE INDEX IDX_6D03435FE318A92 ON mayani_request_inventory_farmer_balance (mayani_request_inventory_id)');
        $this->addSql('CREATE INDEX IDX_6D03435F621A0D8D ON mayani_request_inventory_farmer_balance (farmer_balance_id)');
        $this->addSql('ALTER TABLE mayani_request_inventory_farmer_balance ADD CONSTRAINT FK_6D03435FE318A92 FOREIGN KEY (mayani_request_inventory_id) REFERENCES mayani_request_inventory (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_request_inventory_farmer_balance ADD CONSTRAINT FK_6D03435F621A0D8D FOREIGN KEY (farmer_balance_id) REFERENCES farmer_balance (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE mayani_request_inventory_farmer_balance');
    }
}
