<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20170518153638 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE knowledge (id INT AUTO_INCREMENT NOT NULL, collection_id INT DEFAULT NULL, name VARCHAR(40) NOT NULL, 
created DATETIME NOT NULL, updated DATETIME NOT NULL, issue VARCHAR(100) NOT NULL, answer LONGTEXT NOT NULL, INDEX IDX_9E072E1D514956FD (collection_id), 
PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE knowledge_base_tag (knowledge_base_id INT NOT NULL, tag_id INT NOT NULL, 
INDEX IDX_149710561620F1CE (knowledge_base_id), INDEX IDX_14971056BAD26311 (tag_id), PRIMARY KEY(knowledge_base_id, tag_id)) 
DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE knowledge ADD CONSTRAINT FK_9E072E1D514956FD FOREIGN KEY (collection_id) REFERENCES classification__collection (id)');
        $this->addSql('ALTER TABLE knowledge_base_tag ADD CONSTRAINT FK_149710561620F1CE FOREIGN KEY (knowledge_base_id) 
REFERENCES knowledge (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE knowledge_base_tag ADD CONSTRAINT FK_14971056BAD26311 FOREIGN KEY (tag_id) 
REFERENCES classification__tag (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE knowledge_base_tag DROP FOREIGN KEY FK_149710561620F1CE');
        $this->addSql('DROP TABLE knowledge');
        $this->addSql('DROP TABLE knowledge_base_tag');
    }
}
