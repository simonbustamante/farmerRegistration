<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121213740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE farmer_loans_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE loan_payment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE farmer_loans (id INT NOT NULL, loan_debt DOUBLE PRECISION NOT NULL, time_to_pay TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, monthly_fee DOUBLE PRECISION NOT NULL, date_of_approval TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE loan_payment (id INT NOT NULL, farmer_balance_id_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_43670A79C760CAB6 ON loan_payment (farmer_balance_id_id)');
        $this->addSql('ALTER TABLE loan_payment ADD CONSTRAINT FK_43670A79C760CAB6 FOREIGN KEY (farmer_balance_id_id) REFERENCES farmer_balance (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE farmer_loans_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE loan_payment_id_seq CASCADE');
        $this->addSql('DROP TABLE farmer_loans');
        $this->addSql('DROP TABLE loan_payment');
    }
}
