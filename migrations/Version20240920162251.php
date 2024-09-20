<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240920162251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE visite CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE ville ville VARCHAR(50) NOT NULL, CHANGE pays pays VARCHAR(50) NOT NULL, CHANGE datecreation datecreation DATETIME DEFAULT NULL, CHANGE avis avis LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE visite CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE ville ville VARCHAR(255) DEFAULT NULL, CHANGE pays pays VARCHAR(100) DEFAULT NULL, CHANGE datecreation datecreation VARCHAR(255) DEFAULT NULL, CHANGE avis avis TEXT DEFAULT NULL');
    }
}
