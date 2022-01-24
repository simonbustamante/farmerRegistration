<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124160933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE activity_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE admin_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE b2_cproduct_request_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE farm_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE farm_inventory_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE farmer_balance_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE farmer_loans_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE farmer_register_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "group_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE inventory_update_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE loan_payment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE location_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mayani_loan_products_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mayani_product_inventory_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mayani_request_inventory_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE activity (id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D76E7927C74 ON admin (email)');
        $this->addSql('CREATE TABLE b2_cproduct_request (id INT NOT NULL, mayani_inventory_id_id INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, quantity_kg DOUBLE PRECISION NOT NULL, total_debt DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1280BBE8B1DC06DF ON b2_cproduct_request (mayani_inventory_id_id)');
        $this->addSql('CREATE TABLE farm (id INT NOT NULL, farmer_id_id INT NOT NULL, location_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5816D045D532C99C ON farm (farmer_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5816D045918DB72 ON farm (location_id_id)');
        $this->addSql('CREATE TABLE farm_group (farm_id INT NOT NULL, group_id INT NOT NULL, PRIMARY KEY(farm_id, group_id))');
        $this->addSql('CREATE INDEX IDX_26453B9465FCFA0D ON farm_group (farm_id)');
        $this->addSql('CREATE INDEX IDX_26453B94FE54D947 ON farm_group (group_id)');
        $this->addSql('CREATE TABLE farm_activity (farm_id INT NOT NULL, activity_id INT NOT NULL, PRIMARY KEY(farm_id, activity_id))');
        $this->addSql('CREATE INDEX IDX_F47F5F0065FCFA0D ON farm_activity (farm_id)');
        $this->addSql('CREATE INDEX IDX_F47F5F0081C06096 ON farm_activity (activity_id)');
        $this->addSql('CREATE TABLE farm_inventory (id INT NOT NULL, farm_id_id INT DEFAULT NULL, product_id_id INT DEFAULT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, total_price DOUBLE PRECISION DEFAULT NULL, total_kg DOUBLE PRECISION DEFAULT NULL, farm_description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3ACBF98A34C1E106 ON farm_inventory (farm_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3ACBF98ADE18E50B ON farm_inventory (product_id_id)');
        $this->addSql('CREATE TABLE farmer_balance (id INT NOT NULL, farmer_id_id INT NOT NULL, total_debt DOUBLE PRECISION DEFAULT NULL, total_credit DOUBLE PRECISION DEFAULT NULL, total_monthly_fee DOUBLE PRECISION DEFAULT NULL, farmer_description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_71F57F5AD532C99C ON farmer_balance (farmer_id_id)');
        $this->addSql('CREATE TABLE farmer_balance_farmer_loans (farmer_balance_id INT NOT NULL, farmer_loans_id INT NOT NULL, PRIMARY KEY(farmer_balance_id, farmer_loans_id))');
        $this->addSql('CREATE INDEX IDX_F6FB1284621A0D8D ON farmer_balance_farmer_loans (farmer_balance_id)');
        $this->addSql('CREATE INDEX IDX_F6FB12844BDE3683 ON farmer_balance_farmer_loans (farmer_loans_id)');
        $this->addSql('CREATE TABLE farmer_loans (id INT NOT NULL, mayani_loan_product_id_id INT DEFAULT NULL, loan_debt DOUBLE PRECISION NOT NULL, time_to_pay TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, monthly_fee DOUBLE PRECISION NOT NULL, date_of_approval TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, status VARCHAR(255) NOT NULL, loan_description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_28B41A77ADF96CAD ON farmer_loans (mayani_loan_product_id_id)');
        $this->addSql('CREATE TABLE farmer_register (id INT NOT NULL, name VARCHAR(255) NOT NULL, middle_name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, sex VARCHAR(100) DEFAULT NULL, home_address VARCHAR(255) NOT NULL, contact_number VARCHAR(255) NOT NULL, date_of_birth TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, place_of_birth VARCHAR(255) NOT NULL, country_of_birth VARCHAR(255) NOT NULL, religion VARCHAR(255) DEFAULT NULL, civil_status VARCHAR(255) DEFAULT NULL, spouse_name VARCHAR(255) DEFAULT NULL, highest_education VARCHAR(255) DEFAULT NULL, government_id VARCHAR(255) DEFAULT NULL, mayani_id VARCHAR(255) NOT NULL, right_index VARCHAR(255) DEFAULT NULL, left_index VARCHAR(255) DEFAULT NULL, right_thumb VARCHAR(255) DEFAULT NULL, left_thumb VARCHAR(255) DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
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
        $this->addSql('CREATE TABLE inventory_update (id INT NOT NULL, inventory_id_id INT NOT NULL, quantity_kg DOUBLE PRECISION NOT NULL, credit DOUBLE PRECISION NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_98F9A9D3A3D83557 ON inventory_update (inventory_id_id)');
        $this->addSql('CREATE TABLE loan_payment (id INT NOT NULL, farmer_balance_id_id INT DEFAULT NULL, loan_id_id INT DEFAULT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, quantity_paid DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_43670A79C760CAB6 ON loan_payment (farmer_balance_id_id)');
        $this->addSql('CREATE INDEX IDX_43670A7928FD8608 ON loan_payment (loan_id_id)');
        $this->addSql('CREATE TABLE location (id INT NOT NULL, house VARCHAR(255) NOT NULL, street VARCHAR(255) NOT NULL, barangay VARCHAR(255) NOT NULL, municipality VARCHAR(255) NOT NULL, province VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mayani_loan_products (id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, loan_interest DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mayani_product_inventory (id INT NOT NULL, description VARCHAR(255) NOT NULL, total_inventory_kg DOUBLE PRECISION DEFAULT NULL, total_value DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mayani_request_inventory (id INT NOT NULL, inventory_id_id INT DEFAULT NULL, mayani_product_inventory_id_id INT DEFAULT NULL, quantity_kg DOUBLE PRECISION NOT NULL, debt DOUBLE PRECISION NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B656DAC0A3D83557 ON mayani_request_inventory (inventory_id_id)');
        $this->addSql('CREATE INDEX IDX_B656DAC09B7979E ON mayani_request_inventory (mayani_product_inventory_id_id)');
        $this->addSql('CREATE TABLE mayani_request_inventory_farmer_balance (mayani_request_inventory_id INT NOT NULL, farmer_balance_id INT NOT NULL, PRIMARY KEY(mayani_request_inventory_id, farmer_balance_id))');
        $this->addSql('CREATE INDEX IDX_6D03435FE318A92 ON mayani_request_inventory_farmer_balance (mayani_request_inventory_id)');
        $this->addSql('CREATE INDEX IDX_6D03435F621A0D8D ON mayani_request_inventory_farmer_balance (farmer_balance_id)');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, activity_id_id INT DEFAULT NULL, farm_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, price_per_kg DOUBLE PRECISION NOT NULL, kg_per_month DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D34A04AD6146A8E4 ON product (activity_id_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD34C1E106 ON product (farm_id_id)');
        $this->addSql('ALTER TABLE b2_cproduct_request ADD CONSTRAINT FK_1280BBE8B1DC06DF FOREIGN KEY (mayani_inventory_id_id) REFERENCES mayani_product_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm ADD CONSTRAINT FK_5816D045D532C99C FOREIGN KEY (farmer_id_id) REFERENCES farmer_register (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm ADD CONSTRAINT FK_5816D045918DB72 FOREIGN KEY (location_id_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_group ADD CONSTRAINT FK_26453B9465FCFA0D FOREIGN KEY (farm_id) REFERENCES farm (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_group ADD CONSTRAINT FK_26453B94FE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_activity ADD CONSTRAINT FK_F47F5F0065FCFA0D FOREIGN KEY (farm_id) REFERENCES farm (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_activity ADD CONSTRAINT FK_F47F5F0081C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_inventory ADD CONSTRAINT FK_3ACBF98A34C1E106 FOREIGN KEY (farm_id_id) REFERENCES farm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farm_inventory ADD CONSTRAINT FK_3ACBF98ADE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farmer_balance ADD CONSTRAINT FK_71F57F5AD532C99C FOREIGN KEY (farmer_id_id) REFERENCES farmer_register (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farmer_balance_farmer_loans ADD CONSTRAINT FK_F6FB1284621A0D8D FOREIGN KEY (farmer_balance_id) REFERENCES farmer_balance (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farmer_balance_farmer_loans ADD CONSTRAINT FK_F6FB12844BDE3683 FOREIGN KEY (farmer_loans_id) REFERENCES farmer_loans (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farmer_loans ADD CONSTRAINT FK_28B41A77ADF96CAD FOREIGN KEY (mayani_loan_product_id_id) REFERENCES mayani_loan_products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farmer_register_group ADD CONSTRAINT FK_E98C30EE22D11124 FOREIGN KEY (farmer_register_id) REFERENCES farmer_register (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE farmer_register_group ADD CONSTRAINT FK_E98C30EEFE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_farmer_register ADD CONSTRAINT FK_300CBB5CFE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_farmer_register ADD CONSTRAINT FK_300CBB5C22D11124 FOREIGN KEY (farmer_register_id) REFERENCES farmer_register (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_farm ADD CONSTRAINT FK_714C8B35FE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_farm ADD CONSTRAINT FK_714C8B3565FCFA0D FOREIGN KEY (farm_id) REFERENCES farm (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE inventory_update ADD CONSTRAINT FK_98F9A9D3A3D83557 FOREIGN KEY (inventory_id_id) REFERENCES farm_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loan_payment ADD CONSTRAINT FK_43670A79C760CAB6 FOREIGN KEY (farmer_balance_id_id) REFERENCES farmer_balance (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE loan_payment ADD CONSTRAINT FK_43670A7928FD8608 FOREIGN KEY (loan_id_id) REFERENCES farmer_loans (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_request_inventory ADD CONSTRAINT FK_B656DAC0A3D83557 FOREIGN KEY (inventory_id_id) REFERENCES farm_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_request_inventory ADD CONSTRAINT FK_B656DAC09B7979E FOREIGN KEY (mayani_product_inventory_id_id) REFERENCES mayani_product_inventory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_request_inventory_farmer_balance ADD CONSTRAINT FK_6D03435FE318A92 FOREIGN KEY (mayani_request_inventory_id) REFERENCES mayani_request_inventory (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mayani_request_inventory_farmer_balance ADD CONSTRAINT FK_6D03435F621A0D8D FOREIGN KEY (farmer_balance_id) REFERENCES farmer_balance (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD6146A8E4 FOREIGN KEY (activity_id_id) REFERENCES activity (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD34C1E106 FOREIGN KEY (farm_id_id) REFERENCES farm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE farm_activity DROP CONSTRAINT FK_F47F5F0081C06096');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD6146A8E4');
        $this->addSql('ALTER TABLE farm_group DROP CONSTRAINT FK_26453B9465FCFA0D');
        $this->addSql('ALTER TABLE farm_activity DROP CONSTRAINT FK_F47F5F0065FCFA0D');
        $this->addSql('ALTER TABLE farm_inventory DROP CONSTRAINT FK_3ACBF98A34C1E106');
        $this->addSql('ALTER TABLE group_farm DROP CONSTRAINT FK_714C8B3565FCFA0D');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD34C1E106');
        $this->addSql('ALTER TABLE inventory_update DROP CONSTRAINT FK_98F9A9D3A3D83557');
        $this->addSql('ALTER TABLE mayani_request_inventory DROP CONSTRAINT FK_B656DAC0A3D83557');
        $this->addSql('ALTER TABLE farmer_balance_farmer_loans DROP CONSTRAINT FK_F6FB1284621A0D8D');
        $this->addSql('ALTER TABLE loan_payment DROP CONSTRAINT FK_43670A79C760CAB6');
        $this->addSql('ALTER TABLE mayani_request_inventory_farmer_balance DROP CONSTRAINT FK_6D03435F621A0D8D');
        $this->addSql('ALTER TABLE farmer_balance_farmer_loans DROP CONSTRAINT FK_F6FB12844BDE3683');
        $this->addSql('ALTER TABLE loan_payment DROP CONSTRAINT FK_43670A7928FD8608');
        $this->addSql('ALTER TABLE farm DROP CONSTRAINT FK_5816D045D532C99C');
        $this->addSql('ALTER TABLE farmer_balance DROP CONSTRAINT FK_71F57F5AD532C99C');
        $this->addSql('ALTER TABLE farmer_register_group DROP CONSTRAINT FK_E98C30EE22D11124');
        $this->addSql('ALTER TABLE group_farmer_register DROP CONSTRAINT FK_300CBB5C22D11124');
        $this->addSql('ALTER TABLE farm_group DROP CONSTRAINT FK_26453B94FE54D947');
        $this->addSql('ALTER TABLE farmer_register_group DROP CONSTRAINT FK_E98C30EEFE54D947');
        $this->addSql('ALTER TABLE group_farmer_register DROP CONSTRAINT FK_300CBB5CFE54D947');
        $this->addSql('ALTER TABLE group_farm DROP CONSTRAINT FK_714C8B35FE54D947');
        $this->addSql('ALTER TABLE farm DROP CONSTRAINT FK_5816D045918DB72');
        $this->addSql('ALTER TABLE farmer_loans DROP CONSTRAINT FK_28B41A77ADF96CAD');
        $this->addSql('ALTER TABLE b2_cproduct_request DROP CONSTRAINT FK_1280BBE8B1DC06DF');
        $this->addSql('ALTER TABLE mayani_request_inventory DROP CONSTRAINT FK_B656DAC09B7979E');
        $this->addSql('ALTER TABLE mayani_request_inventory_farmer_balance DROP CONSTRAINT FK_6D03435FE318A92');
        $this->addSql('ALTER TABLE farm_inventory DROP CONSTRAINT FK_3ACBF98ADE18E50B');
        $this->addSql('DROP SEQUENCE activity_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE admin_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE b2_cproduct_request_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE farm_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE farm_inventory_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE farmer_balance_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE farmer_loans_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE farmer_register_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "group_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE inventory_update_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE loan_payment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE location_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mayani_loan_products_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mayani_product_inventory_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mayani_request_inventory_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE b2_cproduct_request');
        $this->addSql('DROP TABLE farm');
        $this->addSql('DROP TABLE farm_group');
        $this->addSql('DROP TABLE farm_activity');
        $this->addSql('DROP TABLE farm_inventory');
        $this->addSql('DROP TABLE farmer_balance');
        $this->addSql('DROP TABLE farmer_balance_farmer_loans');
        $this->addSql('DROP TABLE farmer_loans');
        $this->addSql('DROP TABLE farmer_register');
        $this->addSql('DROP TABLE farmer_register_group');
        $this->addSql('DROP TABLE "group"');
        $this->addSql('DROP TABLE group_farmer_register');
        $this->addSql('DROP TABLE group_farm');
        $this->addSql('DROP TABLE inventory_update');
        $this->addSql('DROP TABLE loan_payment');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE mayani_loan_products');
        $this->addSql('DROP TABLE mayani_product_inventory');
        $this->addSql('DROP TABLE mayani_request_inventory');
        $this->addSql('DROP TABLE mayani_request_inventory_farmer_balance');
        $this->addSql('DROP TABLE product');
    }
}
