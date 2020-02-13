<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200213143746 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE wifi_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE event_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE green_space_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE velib_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE district_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE wifi (id INT NOT NULL, district_id_id INT NOT NULL, district VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9763A24BD0023964 ON wifi (district_id_id)');
        $this->addSql('CREATE TABLE event (id INT NOT NULL, district_id_id INT NOT NULL, district VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7D0023964 ON event (district_id_id)');
        $this->addSql('CREATE TABLE green_space (id INT NOT NULL, district_id_id INT NOT NULL, district VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A72AB67BD0023964 ON green_space (district_id_id)');
        $this->addSql('CREATE TABLE velib (id INT NOT NULL, district_id_id INT NOT NULL, district VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EA06079DD0023964 ON velib (district_id_id)');
        $this->addSql('CREATE TABLE district (id INT NOT NULL, size VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE wifi ADD CONSTRAINT FK_9763A24BD0023964 FOREIGN KEY (district_id_id) REFERENCES district (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7D0023964 FOREIGN KEY (district_id_id) REFERENCES district (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE green_space ADD CONSTRAINT FK_A72AB67BD0023964 FOREIGN KEY (district_id_id) REFERENCES district (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE velib ADD CONSTRAINT FK_EA06079DD0023964 FOREIGN KEY (district_id_id) REFERENCES district (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE wifi DROP CONSTRAINT FK_9763A24BD0023964');
        $this->addSql('ALTER TABLE event DROP CONSTRAINT FK_3BAE0AA7D0023964');
        $this->addSql('ALTER TABLE green_space DROP CONSTRAINT FK_A72AB67BD0023964');
        $this->addSql('ALTER TABLE velib DROP CONSTRAINT FK_EA06079DD0023964');
        $this->addSql('DROP SEQUENCE wifi_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE event_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE green_space_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE velib_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE district_id_seq CASCADE');
        $this->addSql('DROP TABLE wifi');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE green_space');
        $this->addSql('DROP TABLE velib');
        $this->addSql('DROP TABLE district');
    }
}
