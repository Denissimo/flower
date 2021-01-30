<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210130182142 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE flower_bouquet (
            id INT AUTO_INCREMENT NOT NULL, 
            category_id INT DEFAULT NULL, 
            photo_id INT DEFAULT NULL, 
            thumbnail_id INT DEFAULT NULL, 
            name_rus VARCHAR(255) DEFAULT NULL, 
            name_eng VARCHAR(255) DEFAULT NULL, 
            desc_rus LONGTEXT DEFAULT NULL, 
            desc_eng LONGTEXT DEFAULT NULL, 
            available TINYINT(1) DEFAULT NULL, 
            sort_index SMALLINT DEFAULT NULL, 
            least_quantity SMALLINT DEFAULT NULL, 
            INDEX IDX_C34D678012469DE2 (category_id), 
            INDEX IDX_C34D67807E9E4C8C (photo_id), 
            INDEX IDX_C34D6780FDFF2E92 (thumbnail_id), 
            PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE flower_bouquet ADD CONSTRAINT FK_C34D678012469DE2 FOREIGN KEY (category_id) REFERENCES flower_category (id)');
        $this->addSql('ALTER TABLE flower_bouquet ADD CONSTRAINT FK_C34D67807E9E4C8C FOREIGN KEY (photo_id) REFERENCES flower_photo (id)');
        $this->addSql('ALTER TABLE flower_bouquet ADD CONSTRAINT FK_C34D6780FDFF2E92 FOREIGN KEY (thumbnail_id) REFERENCES flower_photo (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE flower_bouquet');
    }
}
