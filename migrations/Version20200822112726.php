<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200822112726 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__vehicle AS SELECT id, name, type FROM vehicle');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('CREATE TABLE vehicle (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, type VARCHAR(20) NOT NULL, color VARCHAR(255) DEFAULT NULL, description CLOB DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL)');
        $this->addSql('INSERT INTO vehicle (id, name, type) SELECT id, name, type FROM __temp__vehicle');
        $this->addSql('DROP TABLE __temp__vehicle');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__vehicle AS SELECT id, name, type FROM vehicle');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('CREATE TABLE vehicle (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(20) DEFAULT \'car\' NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO vehicle (id, name, type) SELECT id, name, type FROM __temp__vehicle');
        $this->addSql('DROP TABLE __temp__vehicle');
    }
}
