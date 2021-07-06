<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210706091950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entrepreneur (id INT AUTO_INCREMENT NOT NULL, head_id INT NOT NULL, user_id INT NOT NULL, ogrn VARCHAR(15) DEFAULT NULL, inn VARCHAR(12) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(64) DEFAULT NULL, active TINYINT(1) DEFAULT \'1\' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_F28C90A3F41A619E (head_id), INDEX IDX_F28C90A3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrepreneur_individual (entrepreneur_id INT NOT NULL, individual_id INT NOT NULL, INDEX IDX_70C3B8A3283063EA (entrepreneur_id), INDEX IDX_70C3B8A3AE271C0D (individual_id), PRIMARY KEY(entrepreneur_id, individual_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, place_of_birth VARCHAR(255) DEFAULT NULL, residence VARCHAR(255) DEFAULT NULL, snils VARCHAR(11) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8793FC17A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE legal_entity (id INT AUTO_INCREMENT NOT NULL, head_id INT DEFAULT NULL, user_id INT NOT NULL, full_name VARCHAR(255) NOT NULL, short_name VARCHAR(255) NOT NULL, ogrn VARCHAR(13) DEFAULT NULL, inn VARCHAR(12) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, head_position VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_E21E9E13F41A619E (head_id), INDEX IDX_E21E9E13A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE legal_entity_individual (legal_entity_id INT NOT NULL, individual_id INT NOT NULL, INDEX IDX_A959AD006DEC420C (legal_entity_id), INDEX IDX_A959AD00AE271C0D (individual_id), PRIMARY KEY(legal_entity_id, individual_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entrepreneur ADD CONSTRAINT FK_F28C90A3F41A619E FOREIGN KEY (head_id) REFERENCES individual (id)');
        $this->addSql('ALTER TABLE entrepreneur ADD CONSTRAINT FK_F28C90A3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE entrepreneur_individual ADD CONSTRAINT FK_70C3B8A3283063EA FOREIGN KEY (entrepreneur_id) REFERENCES entrepreneur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrepreneur_individual ADD CONSTRAINT FK_70C3B8A3AE271C0D FOREIGN KEY (individual_id) REFERENCES individual (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual ADD CONSTRAINT FK_8793FC17A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE legal_entity ADD CONSTRAINT FK_E21E9E13F41A619E FOREIGN KEY (head_id) REFERENCES individual (id)');
        $this->addSql('ALTER TABLE legal_entity ADD CONSTRAINT FK_E21E9E13A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE legal_entity_individual ADD CONSTRAINT FK_A959AD006DEC420C FOREIGN KEY (legal_entity_id) REFERENCES legal_entity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE legal_entity_individual ADD CONSTRAINT FK_A959AD00AE271C0D FOREIGN KEY (individual_id) REFERENCES individual (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD middlename VARCHAR(64) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entrepreneur_individual DROP FOREIGN KEY FK_70C3B8A3283063EA');
        $this->addSql('ALTER TABLE entrepreneur DROP FOREIGN KEY FK_F28C90A3F41A619E');
        $this->addSql('ALTER TABLE entrepreneur_individual DROP FOREIGN KEY FK_70C3B8A3AE271C0D');
        $this->addSql('ALTER TABLE legal_entity DROP FOREIGN KEY FK_E21E9E13F41A619E');
        $this->addSql('ALTER TABLE legal_entity_individual DROP FOREIGN KEY FK_A959AD00AE271C0D');
        $this->addSql('ALTER TABLE legal_entity_individual DROP FOREIGN KEY FK_A959AD006DEC420C');
        $this->addSql('DROP TABLE entrepreneur');
        $this->addSql('DROP TABLE entrepreneur_individual');
        $this->addSql('DROP TABLE individual');
        $this->addSql('DROP TABLE legal_entity');
        $this->addSql('DROP TABLE legal_entity_individual');
        $this->addSql('ALTER TABLE user DROP middlename');
    }
}
