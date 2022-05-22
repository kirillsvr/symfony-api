<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220520210336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE author_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE author (id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE book ADD authors_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book DROP authors');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3316DE2013A FOREIGN KEY (authors_id) REFERENCES author (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_CBE5A3316DE2013A ON book (authors_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE book DROP CONSTRAINT FK_CBE5A3316DE2013A');
        $this->addSql('DROP SEQUENCE author_id_seq CASCADE');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP INDEX IDX_CBE5A3316DE2013A');
        $this->addSql('ALTER TABLE book ADD authors TEXT NOT NULL');
        $this->addSql('ALTER TABLE book DROP authors_id');
        $this->addSql('COMMENT ON COLUMN book.authors IS \'(DC2Type:simple_array)\'');
    }
}
