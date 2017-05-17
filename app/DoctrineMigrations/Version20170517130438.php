<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20170517130438 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projects ADD full_name VARCHAR(40) DEFAULT NULL, 
ADD work_description LONGTEXT DEFAULT NULL, ADD my_role LONGTEXT DEFAULT NULL, 
CHANGE name name VARCHAR(20) NOT NULL, CHANGE weight weight SMALLINT DEFAULT 0 NOT NULL, 
CHANGE status status TINYINT(1) DEFAULT \'0\' NOT NULL, 
CHANGE display_on_home_page display_on_home_page TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX name_idx ON projects (name)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX name_idx ON projects');
        $this->addSql('ALTER TABLE projects DROP full_name, DROP work_description, DROP my_role, 
CHANGE name name VARCHAR(40) NOT NULL COLLATE utf8_unicode_ci, CHANGE weight weight SMALLINT NOT NULL, 
CHANGE status status TINYINT(1) NOT NULL, CHANGE display_on_home_page display_on_home_page TINYINT(1) NOT NULL');
    }
}
