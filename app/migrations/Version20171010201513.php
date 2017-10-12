<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171010201513 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE guild_application (id INT AUTO_INCREMENT NOT NULL, realname VARCHAR(255) NOT NULL, age INT NOT NULL, location VARCHAR(255) NOT NULL, charactername VARCHAR(255) NOT NULL, characterclass VARCHAR(255) NOT NULL, armorylink VARCHAR(255) NOT NULL, battletag VARCHAR(255) NOT NULL, mainspec VARCHAR(255) NOT NULL, offspec VARCHAR(255) NOT NULL, experience LONGTEXT NOT NULL, gametime LONGTEXT NOT NULL, communication LONGTEXT NOT NULL, criticism LONGTEXT NOT NULL, effort LONGTEXT NOT NULL, availability LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE guild_application');
    }
}
