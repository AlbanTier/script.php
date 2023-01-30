<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230130134710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE movie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE performer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE movie (id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, released_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, rating INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN movie.released_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE movie_performer (movie_id INT NOT NULL, performer_id INT NOT NULL, PRIMARY KEY(movie_id, performer_id))');
        $this->addSql('CREATE INDEX IDX_84F402ED8F93B6FC ON movie_performer (movie_id)');
        $this->addSql('CREATE INDEX IDX_84F402ED6C6B33F3 ON movie_performer (performer_id)');
        $this->addSql('CREATE TABLE performer (id INT NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE movie_performer ADD CONSTRAINT FK_84F402ED8F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE movie_performer ADD CONSTRAINT FK_84F402ED6C6B33F3 FOREIGN KEY (performer_id) REFERENCES performer (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE movie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE performer_id_seq CASCADE');
        $this->addSql('ALTER TABLE movie_performer DROP CONSTRAINT FK_84F402ED8F93B6FC');
        $this->addSql('ALTER TABLE movie_performer DROP CONSTRAINT FK_84F402ED6C6B33F3');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE movie_performer');
        $this->addSql('DROP TABLE performer');
    }
}
