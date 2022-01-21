<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121213934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE farmer_loans ADD mayani_loan_product_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE farmer_loans ADD CONSTRAINT FK_28B41A77ADF96CAD FOREIGN KEY (mayani_loan_product_id_id) REFERENCES mayani_loan_products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_28B41A77ADF96CAD ON farmer_loans (mayani_loan_product_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE farmer_loans DROP CONSTRAINT FK_28B41A77ADF96CAD');
        $this->addSql('DROP INDEX IDX_28B41A77ADF96CAD');
        $this->addSql('ALTER TABLE farmer_loans DROP mayani_loan_product_id_id');
    }
}
