<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161219230944 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE patient CHANGE date_de_naissance date_de_naissance DATE DEFAULT NULL, CHANGE telephone1 telephone1 VARCHAR(10) DEFAULT NULL, CHANGE telephone2 telephone2 VARCHAR(10) DEFAULT NULL, CHANGE telephone3 telephone3 VARCHAR(10) DEFAULT NULL, CHANGE activite activite VARCHAR(100) DEFAULT NULL, CHANGE notes notes LONGTEXT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE patient CHANGE date_de_naissance date_de_naissance DATE NOT NULL, CHANGE telephone1 telephone1 VARCHAR(10) NOT NULL COLLATE utf8_unicode_ci, CHANGE telephone2 telephone2 VARCHAR(10) NOT NULL COLLATE utf8_unicode_ci, CHANGE telephone3 telephone3 VARCHAR(10) NOT NULL COLLATE utf8_unicode_ci, CHANGE activite activite VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, CHANGE notes notes LONGTEXT NOT NULL COLLATE utf8_unicode_ci');
    }
}
