<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121002522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE activity_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE b2_cproduct_request_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE farm_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE farm_product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE farmer_balance_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE farmer_register_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "group_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE loan_payment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE loans_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE location_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mayani_loan_products_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mayani_product_inventory_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE activity_type (id INT NOT NULL, farm_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8F1A8CBB34C1E106 ON activity_type (farm_id_id)');
        $this->addSql('CREATE TABLE b2_cproduct_request (id INT NOT NULL, inventory_id INT NOT NULL, quantity_kg DOUBLE PRECISION NOT NULL, total_debits DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1280BBE89EEA759 ON b2_cproduct_request (inventory_id)');
        $this->addSql('CREATE TABLE farm (id INT NOT NULL, farmer_id_id INT NOT NULL, location_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5816D045D532C99C ON farm (farmer_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5816D045918DB72 ON farm (location_id_id)');
        $this->addSql('CREATE TABLE farm_product (id INT NOT NULL, farm_id_id INT NOT NULL, product_id_id INT NOT NULL, mayani_inventory_id_id INT DEFAULT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, quatity_kg DOUBLE PRECISION NOT NULL, total_price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B0504F9034C1E106 ON farm_product (farm_id_id)');
        $this->addSql('CREATE INDEX IDX_B0504F90DE18E50B ON farm_product (product_id_id)');
        $this->addSql('CREATE INDEX IDX_B0504F90B1DC06DF ON farm_product (mayani_inventory_id_id)');
        $this->addSql('CREATE TABLE farmer_balance (id INT NOT NULL, farmer_id_id INT NOT NULL, farm_id_id INT NOT NULL, total_debt DOUBLE PRECISION DEFAULT NULL, total_credit DOUBLE PRECISION DEFAULT NULL, total_monthly_fee DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_71F57F5AD532C99C ON farmer_balance (farmer_id_id)');
        $this->addSql('CREATE INDEX IDX_71F57F5A34C1E106 ON farmer_balance (farm_id_id)');
        $this->addSql('CREATE TABLE farmer_register (id INT NOT NULL, name VARCHAR(255) NOT NULL, middle_name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, sex VARCHAR(100) DEFAULT NULL, home_address VARCHAR(255) NOT NULL, contact_number VARCHAR(255) NOT NULL, date_of_birth TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, place_of_birth VARCHAR(255) NOT NULL, country_of_birth VARCHAR(255) NOT NULL, religion VARCHAR(255) DEFAULT NULL, civil_status VARCHAR(255) DEFAULT NULL, spouse_name VARCHAR(255) DEFAULT NULL, highest_education VARCHAR(255) DEFAULT NULL, government_id VARCHAR(255) DEFAULT NULL, mayani_id VARCHAR(255) NOT NULL, right_index VARCHAR(255) DEFAULT NULL, left_index VARCHAR(255) DEFAULT NULL, right_thumb VARCHAR(255) DEFAULT NULL, left_thumb VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE farmer_register_group (farmer_register_id INT NOT NULL, group_id INT NOT NULL, PRIMARY KEY(farmer_register_id, group_id))');
        $this->addSql('CREATE INDEX IDX_E98C30EE22D11124 ON farmer_register_group (farmer_register_id)');
        $this->addSql('CREATE INDEX IDX_E98C30EEFE54D947 ON farmer_register_group (group_id)');
        $this->addSql('CREATE TABLE "group" (id INT NOT NULL, name VARCHAR(255) NOT NULL, id_number VARCHAR(255) NOT NULL, year_of_foundation TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE group_farmer_register (group_id INT NOT NULL, farmer_register_id INT NOT NULL, PRIMARY KEY(group_id, farmer_register_id))');
        $this->addSql('CREATE INDEX IDX_300CBB5CFE54D947 ON group_farmer_register (group_id)');
        $this->addSql('CREATE INDEX IDX_300CBB5C22D11124 ON group_farmer_register (farmer_register_id)');
        $this->addSql('CREATE TABLE group_farm (group_id INT NOT NULL, farm_id INT NOT NULL, PRIMARY KEY(group_id, farm_id))');
        $this->addSql('CREATE INDEX IDX_714C8B35FE54D947 ON group_farm (group_id)');
        $this->addSql('CREATE INDEX IDX_714C8B3565FCFA0D ON group_farm (farm_id)');
        $this->addSql('CREATE TABLE loan_payment (id INT NOT NULL, farmer_balance_id_id INT DEFAULT NULL, quantity_paid DOUBLE PRECISION NOT NULL, date_of_payment TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_43670A79C760CAB6 ON loan_payment (farmer_balance_id_id)');
        $this->addSql('CREATE TABLE loans (id INT NOT NULL, farmer_balance_id_id INT NOT NULL, mayani_loan_product_id_id INT DEFAULT NULL, date_of_approval TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_to_pay TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, loan_quantity DOUBLE PRECISION DEFAULT NULL, status VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_82C24DBCC760CAB6 ON loans (farmer_balance_id_id)');
        $this->addSql('CREATE INDEX IDX_82C24DBCADF96CAD ON loans (mayani_loan_product_id_id)');
        $this->addSql('CREATE TABLE location (id INT NOT NULL, house VARCHAR(255) NOT NULL, street VARCHAR(255) NOT NULL, barangay VARCHAR(255) NOT NULL, municipality VARCHAR(255) NOT NULL, province VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mayani_loan_products (id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, loan_interest DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mayani_product_inventory (id INT NOT NULL, current_inventory_kg DOUBLE PRECISION NOT NULL, total_farm_product_credit DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mayani_product_inventory_farm_product (mayani_product_inventory_id INT NOT NULL, farm_product_id INT NOT NULL, PRIMARY KEY(mayani_product_inventory_id, farm_product_id))');
        $this->addSql('CREATE INDEX IDX_8F1A11CD98BFF121 ON mayani_product_inventory_farm_product (mayani_product_inventory_id)');
        $this->addSql('CREATE INDEX IDX_8F1A11CD87D87F4E ON mayani_product_inventory_farm_product (farm_product_id)');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, name VARCHAR(255) NOT NULL, price_per_kg DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE activity_type ADD CONSTRAINT FK_8F1A8CBB34C1E106 FOREIGN KEY (farm_id_id) REFERENCES farm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE b2_cproduct_request ADD CONSTRAINT FK_1280BBE89EEA759 FOREIGN KEY (inventory_id) REFERENCES mayani_product_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm ADD CONSTRAINT FK_5816D045D532C99C FOREIGN KEY (farmer_id_id) REFERENCES farmer_register (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm ADD CONSTRAINT FK_5816D045918DB72 FOREIGN KEY (location_id_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_product ADD CONSTRAINT FK_B0504F9034C1E106 FOREIGN KEY (farm_id_id) REFERENCES farm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_product ADD CONSTRAINT FK_B0504F90DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_product ADD CONSTRAINT FK_B0504F90B1DC06DF FOREIGN KEY (mayani_inventory_id_id) REFERENCES mayani_product_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farmer_balance ADD CONSTRAINT FK_71F57F5AD532C99C FOREIGN KEY (farmer_id_id) REFERENCES farmer_register (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farmer_balance ADD CONSTRAINT FK_71F57F5A34C1E106 FOREIGN KEY (farm_id_id) REFERENCES farm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farmer_register_group ADD CONSTRAINT FK_E98C30EE22D11124 FOREIGN KEY (farmer_register_id) REFERENCES farmer_register (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farmer_register_group ADD CONSTRAINT FK_E98C30EEFE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_farmer_register ADD CONSTRAINT FK_300CBB5CFE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_farmer_register ADD CONSTRAINT FK_300CBB5C22D11124 FOREIGN KEY (farmer_register_id) REFERENCES farmer_register (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_farm ADD CONSTRAINT FK_714C8B35FE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_farm ADD CONSTRAINT FK_714C8B3565FCFA0D FOREIGN KEY (farm_id) REFERENCES farm (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loan_payment ADD CONSTRAINT FK_43670A79C760CAB6 FOREIGN KEY (farmer_balance_id_id) REFERENCES farmer_balance (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loans ADD CONSTRAINT FK_82C24DBCC760CAB6 FOREIGN KEY (farmer_balance_id_id) REFERENCES farmer_balance (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loans ADD CONSTRAINT FK_82C24DBCADF96CAD FOREIGN KEY (mayani_loan_product_id_id) REFERENCES mayani_loan_products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_product_inventory_farm_product ADD CONSTRAINT FK_8F1A11CD98BFF121 FOREIGN KEY (mayani_product_inventory_id) REFERENCES mayani_product_inventory (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_product_inventory_farm_product ADD CONSTRAINT FK_8F1A11CD87D87F4E FOREIGN KEY (farm_product_id) REFERENCES farm_product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE activity_type DROP CONSTRAINT FK_8F1A8CBB34C1E106');
        $this->addSql('ALTER TABLE farm_product DROP CONSTRAINT FK_B0504F9034C1E106');
        $this->addSql('ALTER TABLE farmer_balance DROP CONSTRAINT FK_71F57F5A34C1E106');
        $this->addSql('ALTER TABLE group_farm DROP CONSTRAINT FK_714C8B3565FCFA0D');
        $this->addSql('ALTER TABLE mayani_product_inventory_farm_product DROP CONSTRAINT FK_8F1A11CD87D87F4E');
        $this->addSql('ALTER TABLE loan_payment DROP CONSTRAINT FK_43670A79C760CAB6');
        $this->addSql('ALTER TABLE loans DROP CONSTRAINT FK_82C24DBCC760CAB6');
        $this->addSql('ALTER TABLE farm DROP CONSTRAINT FK_5816D045D532C99C');
        $this->addSql('ALTER TABLE farmer_balance DROP CONSTRAINT FK_71F57F5AD532C99C');
        $this->addSql('ALTER TABLE farmer_register_group DROP CONSTRAINT FK_E98C30EE22D11124');
        $this->addSql('ALTER TABLE group_farmer_register DROP CONSTRAINT FK_300CBB5C22D11124');
        $this->addSql('ALTER TABLE farmer_register_group DROP CONSTRAINT FK_E98C30EEFE54D947');
        $this->addSql('ALTER TABLE group_farmer_register DROP CONSTRAINT FK_300CBB5CFE54D947');
        $this->addSql('ALTER TABLE group_farm DROP CONSTRAINT FK_714C8B35FE54D947');
        $this->addSql('ALTER TABLE farm DROP CONSTRAINT FK_5816D045918DB72');
        $this->addSql('ALTER TABLE loans DROP CONSTRAINT FK_82C24DBCADF96CAD');
        $this->addSql('ALTER TABLE b2_cproduct_request DROP CONSTRAINT FK_1280BBE89EEA759');
        $this->addSql('ALTER TABLE farm_product DROP CONSTRAINT FK_B0504F90B1DC06DF');
        $this->addSql('ALTER TABLE mayani_product_inventory_farm_product DROP CONSTRAINT FK_8F1A11CD98BFF121');
        $this->addSql('ALTER TABLE farm_product DROP CONSTRAINT FK_B0504F90DE18E50B');
        $this->addSql('DROP SEQUENCE activity_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE b2_cproduct_request_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE farm_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE farm_product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE farmer_balance_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE farmer_register_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "group_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE loan_payment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE loans_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE location_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mayani_loan_products_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mayani_product_inventory_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP TABLE activity_type');
        $this->addSql('DROP TABLE b2_cproduct_request');
        $this->addSql('DROP TABLE farm');
        $this->addSql('DROP TABLE farm_product');
        $this->addSql('DROP TABLE farmer_balance');
        $this->addSql('DROP TABLE farmer_register');
        $this->addSql('DROP TABLE farmer_register_group');
        $this->addSql('DROP TABLE "group"');
        $this->addSql('DROP TABLE group_farmer_register');
        $this->addSql('DROP TABLE group_farm');
        $this->addSql('DROP TABLE loan_payment');
        $this->addSql('DROP TABLE loans');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE mayani_loan_products');
        $this->addSql('DROP TABLE mayani_product_inventory');
        $this->addSql('DROP TABLE mayani_product_inventory_farm_product');
        $this->addSql('DROP TABLE product');
    }
}
