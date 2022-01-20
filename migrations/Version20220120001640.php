<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220120001640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE loan_payment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mayani_loan_products_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE loan_payment (id INT NOT NULL, farmer_balance_id_id INT DEFAULT NULL, quantity_paid DOUBLE PRECISION NOT NULL, date_of_payment TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_43670A79C760CAB6 ON loan_payment (farmer_balance_id_id)');
        $this->addSql('CREATE TABLE mayani_loan_products (id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, loan_interest DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE loan_payment ADD CONSTRAINT FK_43670A79C760CAB6 FOREIGN KEY (farmer_balance_id_id) REFERENCES farmer_balance (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loans ADD farmer_balance_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE loans ADD mayani_loan_product_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE loans DROP monthly_fee');
        $this->addSql('ALTER TABLE loans ADD CONSTRAINT FK_82C24DBCC760CAB6 FOREIGN KEY (farmer_balance_id_id) REFERENCES farmer_balance (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loans ADD CONSTRAINT FK_82C24DBCADF96CAD FOREIGN KEY (mayani_loan_product_id_id) REFERENCES mayani_loan_products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_82C24DBCC760CAB6 ON loans (farmer_balance_id_id)');
        $this->addSql('CREATE INDEX IDX_82C24DBCADF96CAD ON loans (mayani_loan_product_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE loans DROP CONSTRAINT FK_82C24DBCADF96CAD');
        $this->addSql('DROP SEQUENCE loan_payment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mayani_loan_products_id_seq CASCADE');
        $this->addSql('DROP TABLE loan_payment');
        $this->addSql('DROP TABLE mayani_loan_products');
        $this->addSql('ALTER TABLE loans DROP CONSTRAINT FK_82C24DBCC760CAB6');
        $this->addSql('DROP INDEX IDX_82C24DBCC760CAB6');
        $this->addSql('DROP INDEX IDX_82C24DBCADF96CAD');
        $this->addSql('ALTER TABLE loans ADD monthly_fee DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE loans DROP farmer_balance_id_id');
        $this->addSql('ALTER TABLE loans DROP mayani_loan_product_id_id');
    }
}
