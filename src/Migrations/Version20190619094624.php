<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190619094624 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categorie_portfolio (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE portfolio ADD categorie_portfolio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE portfolio ADD CONSTRAINT FK_A9ED1062C06810C1 FOREIGN KEY (categorie_portfolio_id) REFERENCES categorie_portfolio (id)');
        $this->addSql('CREATE INDEX IDX_A9ED1062C06810C1 ON portfolio (categorie_portfolio_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE portfolio DROP FOREIGN KEY FK_A9ED1062C06810C1');
        $this->addSql('DROP TABLE categorie_portfolio');
        $this->addSql('DROP INDEX IDX_A9ED1062C06810C1 ON portfolio');
        $this->addSql('ALTER TABLE portfolio DROP categorie_portfolio_id');
    }
}
