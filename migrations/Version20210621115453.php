<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210621115453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE flower_shop (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, logo_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, color VARCHAR(7) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_957BDBB9A76ED395 (user_id), INDEX IDX_957BDBB9F98F144A (logo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flower_shop_logo (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, logo_name VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) DEFAULT NULL, size INT DEFAULT NULL, mime_type VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, INDEX IDX_1BB471BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE flower_shop ADD CONSTRAINT FK_957BDBB9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE flower_shop ADD CONSTRAINT FK_957BDBB9F98F144A FOREIGN KEY (logo_id) REFERENCES flower_shop_logo (id)');
        $this->addSql('ALTER TABLE flower_shop_logo ADD CONSTRAINT FK_1BB471BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE flower_bouquet ADD shop_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE flower_bouquet ADD CONSTRAINT FK_C34D67804D16C4DD FOREIGN KEY (shop_id) REFERENCES flower_shop (id)');
        $this->addSql('CREATE INDEX IDX_C34D67804D16C4DD ON flower_bouquet (shop_id)');
        $this->addSql('ALTER TABLE flower_category ADD created_at DATETIME NOT NULL DEFAULT NOW(), ADD updated_at DATETIME NOT NULL  DEFAULT NOW()');
        $this->addSql('ALTER TABLE flower_category ALTER COLUMN created_at DROP DEFAULT, ALTER COLUMN updated_at DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flower_bouquet DROP FOREIGN KEY FK_C34D67804D16C4DD');
        $this->addSql('ALTER TABLE flower_shop DROP FOREIGN KEY FK_957BDBB9F98F144A');
        $this->addSql('DROP TABLE flower_shop');
        $this->addSql('DROP TABLE flower_shop_logo');
        $this->addSql('DROP INDEX IDX_C34D67804D16C4DD ON flower_bouquet');
        $this->addSql('ALTER TABLE flower_bouquet DROP shop_id');
        $this->addSql('ALTER TABLE flower_category DROP created_at, DROP updated_at');
    }
}
