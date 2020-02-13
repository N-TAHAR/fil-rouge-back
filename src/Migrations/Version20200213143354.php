<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200213143354 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE location_wifi_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE velib_position_id_seq CASCADE');
        $this->addSql('DROP TABLE location_wifi');
        $this->addSql('DROP TABLE velib_position');
        $this->addSql('ALTER TABLE green_space ADD district_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE green_space ADD CONSTRAINT FK_A72AB67BD0023964 FOREIGN KEY (district_id_id) REFERENCES district (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A72AB67BD0023964 ON green_space (district_id_id)');
        $this->addSql('ALTER TABLE district ALTER size TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE district ALTER size DROP DEFAULT');
        $this->addSql('ALTER TABLE district RENAME COLUMN green_space TO code');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE location_wifi_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE velib_position_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE location_wifi (id INT NOT NULL, location_wifi VARCHAR(255) NOT NULL, get_total_wifi VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE velib_position (id INT NOT NULL, velib_position VARCHAR(255) NOT NULL, get_total_velib VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE green_space DROP CONSTRAINT FK_A72AB67BD0023964');
        $this->addSql('DROP INDEX IDX_A72AB67BD0023964');
        $this->addSql('ALTER TABLE green_space DROP district_id_id');
        $this->addSql('ALTER TABLE district ALTER size TYPE INT');
        $this->addSql('ALTER TABLE district ALTER size DROP DEFAULT');
        $this->addSql('ALTER TABLE district RENAME COLUMN code TO green_space');
    }
}
