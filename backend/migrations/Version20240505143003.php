<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240505143003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reply ADD contact_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reply ADD CONSTRAINT FK_FDA8C6E0E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('CREATE INDEX IDX_FDA8C6E0E7A1254A ON reply (contact_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reply DROP FOREIGN KEY FK_FDA8C6E0E7A1254A');
        $this->addSql('DROP INDEX IDX_FDA8C6E0E7A1254A ON reply');
        $this->addSql('ALTER TABLE reply DROP contact_id');
    }
}
