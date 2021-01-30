<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210130183108 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flower_bouquet ADD least_sum INT DEFAULT NULL');
        $this->addSql('ALTER TABLE flower_category CHANGE leat_qty least_qty SMALLINT DEFAULT NULL, CHANGE leat_sum least_sum INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flower_bouquet DROP least_sum');
        $this->addSql('ALTER TABLE flower_category CHANGE least_qty leat_qty SMALLINT DEFAULT NULL, CHANGE least_sum leat_sum INT DEFAULT NULL');
    }
}
