<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200822142829 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE boat');
        $this->addSql('CREATE TABLE boat (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, vehicle_id INTEGER NOT NULL, num_engines INTEGER DEFAULT NULL, propulsion VARCHAR(255) DEFAULT NULL, passengers INTEGER DEFAULT NULL, crew INTEGER DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D86E834A545317D1 ON boat (vehicle_id)');
        $this->addSql('CREATE TABLE car (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, vehicle_id INTEGER NOT NULL, motor VARCHAR(255) DEFAULT NULL, fuel VARCHAR(255) DEFAULT NULL, passengers INTEGER DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69D545317D1 ON car (vehicle_id)');
        $this->addSql('CREATE TABLE plane (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, vehicle_id INTEGER NOT NULL, num_engines INTEGER DEFAULT NULL, engine_type VARCHAR(255) DEFAULT NULL, seating INTEGER DEFAULT NULL, crew INTEGER DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C1B32D80545317D1 ON plane (vehicle_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__vehicle AS SELECT id, name, type, color, description, price FROM vehicle');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('CREATE TABLE vehicle (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, type VARCHAR(20) NOT NULL COLLATE BINARY, color VARCHAR(255) DEFAULT NULL COLLATE BINARY, price DOUBLE PRECISION DEFAULT NULL, description CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO vehicle (id, name, type, color, description, price) SELECT id, name, type, color, description, price FROM __temp__vehicle');
        $this->addSql('DROP TABLE __temp__vehicle');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE boat');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE plane');
        $this->addSql('CREATE TEMPORARY TABLE __temp__vehicle AS SELECT id, name, type, color, description, price FROM vehicle');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('CREATE TABLE vehicle (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(20) NOT NULL, color VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, description CLOB DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO vehicle (id, name, type, color, description, price) SELECT id, name, type, color, description, price FROM __temp__vehicle');
        $this->addSql('DROP TABLE __temp__vehicle');
    }
}
