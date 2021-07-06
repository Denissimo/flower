<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210706111537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flower_shop ADD entrepreneur_id INT DEFAULT NULL, ADD legal_entity_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE flower_shop ADD CONSTRAINT FK_957BDBB9283063EA FOREIGN KEY (entrepreneur_id) REFERENCES entrepreneur (id)');
        $this->addSql('ALTER TABLE flower_shop ADD CONSTRAINT FK_957BDBB96DEC420C FOREIGN KEY (legal_entity_id) REFERENCES legal_entity (id)');
        $this->addSql('CREATE INDEX IDX_957BDBB9283063EA ON flower_shop (entrepreneur_id)');
        $this->addSql('CREATE INDEX IDX_957BDBB96DEC420C ON flower_shop (legal_entity_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flower_shop DROP FOREIGN KEY FK_957BDBB9283063EA');
        $this->addSql('ALTER TABLE flower_shop DROP FOREIGN KEY FK_957BDBB96DEC420C');
        $this->addSql('DROP INDEX IDX_957BDBB9283063EA ON flower_shop');
        $this->addSql('DROP INDEX IDX_957BDBB96DEC420C ON flower_shop');
        $this->addSql('ALTER TABLE flower_shop DROP entrepreneur_id, DROP legal_entity_id');
    }
}
