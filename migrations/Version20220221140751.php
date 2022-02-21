<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220221140751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, user_user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, company VARCHAR(255) DEFAULT NULL, phone VARCHAR(10) NOT NULL, phone2 VARCHAR(10) DEFAULT NULL, email VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zip_code VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_81398E09FF63CD9F (user_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, invoice_type VARCHAR(255) NOT NULL, data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', work_duration VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, customer_name VARCHAR(255) NOT NULL, customer_company VARCHAR(255) DEFAULT NULL, customer_phone VARCHAR(10) NOT NULL, customer_phone2 VARCHAR(10) DEFAULT NULL, customer_email VARCHAR(255) NOT NULL, customer_address VARCHAR(255) NOT NULL, customer_zip_code VARCHAR(5) NOT NULL, customer_city VARCHAR(255) NOT NULL, customer_country VARCHAR(255) NOT NULL, INDEX IDX_90651744166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, quote_id INT DEFAULT NULL, type_of_mission VARCHAR(255) NOT NULL, type_of_site VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, deadline DATE DEFAULT NULL, details LONGTEXT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, rate VARCHAR(255) NOT NULL, invoice_recurrency VARCHAR(255) NOT NULL, first_invoice_date DATE NOT NULL, data_options LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', domain_name VARCHAR(255) DEFAULT NULL, host_name VARCHAR(255) DEFAULT NULL, host_price DOUBLE PRECISION DEFAULT NULL, git_repo VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_2FB3D0EE9395C3F3 (customer_id), UNIQUE INDEX UNIQ_2FB3D0EEDB805178 (quote_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quote (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, type_of_mission VARCHAR(255) NOT NULL, type_on_site VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, rate VARCHAR(255) NOT NULL, data_options LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', status VARCHAR(255) NOT NULL, domain_name VARCHAR(255) DEFAULT NULL, host_name VARCHAR(255) DEFAULT NULL, host_price DOUBLE PRECISION DEFAULT NULL, create_host TINYINT(1) NOT NULL, create_domain TINYINT(1) NOT NULL, data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_6B71CBF49395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09FF63CD9F FOREIGN KEY (user_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEDB805178 FOREIGN KEY (quote_id) REFERENCES quote (id)');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF49395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE9395C3F3');
        $this->addSql('ALTER TABLE quote DROP FOREIGN KEY FK_6B71CBF49395C3F3');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_90651744166D1F9C');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEDB805178');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09FF63CD9F');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE quote');
        $this->addSql('DROP TABLE `user`');
    }
}
