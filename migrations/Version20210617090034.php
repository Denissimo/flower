<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210617090034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flower_bouquet DROP FOREIGN KEY FK_C34D67807E9E4C8C');
        $this->addSql('ALTER TABLE flower_bouquet DROP FOREIGN KEY FK_C34D6780FDFF2E92');
        $this->addSql('DROP INDEX IDX_C34D67807E9E4C8C ON flower_bouquet');
        $this->addSql('DROP INDEX IDX_C34D6780FDFF2E92 ON flower_bouquet');
        $this->addSql('ALTER TABLE flower_bouquet DROP photo_id, DROP thumbnail_id');
        $this->addSql('ALTER TABLE flower_photo ADD flower_bouquet_id INT DEFAULT NULL, ADD large_one_id INT DEFAULT NULL, ADD alt_eng VARCHAR(255) DEFAULT NULL, ADD updated_at DATETIME NOT NULL, DROP is_thumbnail, CHANGE description alt_rus VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE flower_photo ADD CONSTRAINT FK_9EEB5C63A5A51E3E FOREIGN KEY (flower_bouquet_id) REFERENCES flower_bouquet (id)');
        $this->addSql('ALTER TABLE flower_photo ADD CONSTRAINT FK_9EEB5C63AA74FE7 FOREIGN KEY (large_one_id) REFERENCES flower_photo (id)');
        $this->addSql('CREATE INDEX IDX_9EEB5C63A5A51E3E ON flower_photo (flower_bouquet_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9EEB5C63AA74FE7 ON flower_photo (large_one_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flower_bouquet ADD photo_id INT DEFAULT NULL, ADD thumbnail_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE flower_bouquet ADD CONSTRAINT FK_C34D67807E9E4C8C FOREIGN KEY (photo_id) REFERENCES flower_photo (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE flower_bouquet ADD CONSTRAINT FK_C34D6780FDFF2E92 FOREIGN KEY (thumbnail_id) REFERENCES flower_photo (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C34D67807E9E4C8C ON flower_bouquet (photo_id)');
        $this->addSql('CREATE INDEX IDX_C34D6780FDFF2E92 ON flower_bouquet (thumbnail_id)');
        $this->addSql('ALTER TABLE flower_photo DROP FOREIGN KEY FK_9EEB5C63A5A51E3E');
        $this->addSql('ALTER TABLE flower_photo DROP FOREIGN KEY FK_9EEB5C63AA74FE7');
        $this->addSql('DROP INDEX IDX_9EEB5C63A5A51E3E ON flower_photo');
        $this->addSql('DROP INDEX UNIQ_9EEB5C63AA74FE7 ON flower_photo');
        $this->addSql('ALTER TABLE flower_photo ADD is_thumbnail TINYINT(1) NOT NULL, ADD description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP flower_bouquet_id, DROP large_one_id, DROP alt_rus, DROP alt_eng, DROP updated_at');
    }
}
