<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121214137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loan_payment ADD loan_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE loan_payment ADD CONSTRAINT FK_43670A7928FD8608 FOREIGN KEY (loan_id_id) REFERENCES farmer_loans (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_43670A7928FD8608 ON loan_payment (loan_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE loan_payment DROP CONSTRAINT FK_43670A7928FD8608');
        $this->addSql('DROP INDEX IDX_43670A7928FD8608');
        $this->addSql('ALTER TABLE loan_payment DROP loan_id_id');
    }
}
