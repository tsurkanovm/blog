<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * @author Tsurkanov Mihail <tsurkanovm@gmail.com>
 */
class Version20170505140207 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE solutions (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, name VARCHAR(40) NOT NULL, UNIQUE INDEX UNIQ_A90F77E3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, image_template_id INT DEFAULT NULL, image_logo_id INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, name VARCHAR(40) NOT NULL, description LONGTEXT DEFAULT NULL, challenge LONGTEXT DEFAULT NULL, weight SMALLINT NOT NULL, status TINYINT(1) NOT NULL, display_on_home_page TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_5C93B3A4CA0C4436 (image_template_id), UNIQUE INDEX UNIQ_5C93B3A46C9F4396 (image_logo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_solution (project_id INT NOT NULL, solution_id INT NOT NULL, INDEX IDX_A27DA200166D1F9C (project_id), INDEX IDX_A27DA2001C0BE183 (solution_id), PRIMARY KEY(project_id, solution_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE solutions ADD CONSTRAINT FK_A90F77E3DA5256D FOREIGN KEY (image_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4CA0C4436 FOREIGN KEY (image_template_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A46C9F4396 FOREIGN KEY (image_logo_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE project_solution ADD CONSTRAINT FK_A27DA200166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_solution ADD CONSTRAINT FK_A27DA2001C0BE183 FOREIGN KEY (solution_id) REFERENCES solutions (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project_solution DROP FOREIGN KEY FK_A27DA2001C0BE183');
        $this->addSql('ALTER TABLE project_solution DROP FOREIGN KEY FK_A27DA200166D1F9C');
        $this->addSql('DROP TABLE solutions');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE project_solution');
    }
}
