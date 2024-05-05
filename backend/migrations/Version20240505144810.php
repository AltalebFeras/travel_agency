<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240505144810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reply_to_conatct_request (id INT AUTO_INCREMENT NOT NULL, contact_id INT DEFAULT NULL, content VARCHAR(999) DEFAULT NULL, INDEX IDX_D8519DE4E7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reply_to_conatct_request ADD CONSTRAINT FK_D8519DE4E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE reply DROP FOREIGN KEY FK_FDA8C6E0E7A1254A');
        $this->addSql('DROP INDEX IDX_FDA8C6E0E7A1254A ON reply');
        $this->addSql('ALTER TABLE reply DROP contact_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reply_to_conatct_request DROP FOREIGN KEY FK_D8519DE4E7A1254A');
        $this->addSql('DROP TABLE reply_to_conatct_request');
        $this->addSql('ALTER TABLE reply ADD contact_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reply ADD CONSTRAINT FK_FDA8C6E0E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_FDA8C6E0E7A1254A ON reply (contact_id)');
    }
}
