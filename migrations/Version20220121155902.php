<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121155902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE b2_cproduct_request DROP CONSTRAINT fk_1280bbe89eea759');
        $this->addSql('ALTER TABLE farm_product DROP CONSTRAINT fk_b0504f90b1dc06df');
        $this->addSql('ALTER TABLE mayani_product_inventory_farm_product DROP CONSTRAINT fk_8f1a11cd98bff121');
        $this->addSql('ALTER TABLE mayani_product_inventory_farm_product DROP CONSTRAINT fk_8f1a11cd87d87f4e');
        $this->addSql('ALTER TABLE loans DROP CONSTRAINT fk_82c24dbcadf96cad');
        $this->addSql('DROP SEQUENCE b2_cproduct_request_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE farm_product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE loan_payment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE loans_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mayani_loan_products_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mayani_product_inventory_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE farm_inventory_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE farm_inventory (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE mayani_product_inventory');
        $this->addSql('DROP TABLE b2_cproduct_request');
        $this->addSql('DROP TABLE farm_product');
        $this->addSql('DROP TABLE loan_payment');
        $this->addSql('DROP TABLE loans');
        $this->addSql('DROP TABLE mayani_loan_products');
        $this->addSql('DROP TABLE mayani_product_inventory_farm_product');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE farm_inventory_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE b2_cproduct_request_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE farm_product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE loan_payment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE loans_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mayani_loan_products_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mayani_product_inventory_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE mayani_product_inventory (id INT NOT NULL, current_inventory_kg DOUBLE PRECISION NOT NULL, total_farm_product_credit DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE b2_cproduct_request (id INT NOT NULL, inventory_id INT NOT NULL, quantity_kg DOUBLE PRECISION NOT NULL, total_debits DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_1280bbe89eea759 ON b2_cproduct_request (inventory_id)');
        $this->addSql('CREATE TABLE farm_product (id INT NOT NULL, farm_id_id INT NOT NULL, product_id_id INT NOT NULL, mayani_inventory_id_id INT DEFAULT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, quatity_kg DOUBLE PRECISION NOT NULL, total_price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_b0504f9034c1e106 ON farm_product (farm_id_id)');
        $this->addSql('CREATE INDEX idx_b0504f90b1dc06df ON farm_product (mayani_inventory_id_id)');
        $this->addSql('CREATE INDEX idx_b0504f90de18e50b ON farm_product (product_id_id)');
        $this->addSql('CREATE TABLE loan_payment (id INT NOT NULL, farmer_balance_id_id INT DEFAULT NULL, quantity_paid DOUBLE PRECISION NOT NULL, date_of_payment TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_43670a79c760cab6 ON loan_payment (farmer_balance_id_id)');
        $this->addSql('CREATE TABLE loans (id INT NOT NULL, farmer_balance_id_id INT NOT NULL, mayani_loan_product_id_id INT DEFAULT NULL, date_of_approval TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_to_pay TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, loan_quantity DOUBLE PRECISION DEFAULT NULL, status VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_82c24dbcc760cab6 ON loans (farmer_balance_id_id)');
        $this->addSql('CREATE INDEX idx_82c24dbcadf96cad ON loans (mayani_loan_product_id_id)');
        $this->addSql('CREATE TABLE mayani_loan_products (id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, loan_interest DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mayani_product_inventory_farm_product (mayani_product_inventory_id INT NOT NULL, farm_product_id INT NOT NULL, PRIMARY KEY(mayani_product_inventory_id, farm_product_id))');
        $this->addSql('CREATE INDEX idx_8f1a11cd87d87f4e ON mayani_product_inventory_farm_product (farm_product_id)');
        $this->addSql('CREATE INDEX idx_8f1a11cd98bff121 ON mayani_product_inventory_farm_product (mayani_product_inventory_id)');
        $this->addSql('ALTER TABLE b2_cproduct_request ADD CONSTRAINT fk_1280bbe89eea759 FOREIGN KEY (inventory_id) REFERENCES mayani_product_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_product ADD CONSTRAINT fk_b0504f9034c1e106 FOREIGN KEY (farm_id_id) REFERENCES farm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_product ADD CONSTRAINT fk_b0504f90de18e50b FOREIGN KEY (product_id_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_product ADD CONSTRAINT fk_b0504f90b1dc06df FOREIGN KEY (mayani_inventory_id_id) REFERENCES mayani_product_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loan_payment ADD CONSTRAINT fk_43670a79c760cab6 FOREIGN KEY (farmer_balance_id_id) REFERENCES farmer_balance (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loans ADD CONSTRAINT fk_82c24dbcc760cab6 FOREIGN KEY (farmer_balance_id_id) REFERENCES farmer_balance (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loans ADD CONSTRAINT fk_82c24dbcadf96cad FOREIGN KEY (mayani_loan_product_id_id) REFERENCES mayani_loan_products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_product_inventory_farm_product ADD CONSTRAINT fk_8f1a11cd98bff121 FOREIGN KEY (mayani_product_inventory_id) REFERENCES mayani_product_inventory (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_product_inventory_farm_product ADD CONSTRAINT fk_8f1a11cd87d87f4e FOREIGN KEY (farm_product_id) REFERENCES farm_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE farm_inventory');
    }
}
