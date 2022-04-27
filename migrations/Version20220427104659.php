<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220427104659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, day_id INT DEFAULT NULL, hour_id INT DEFAULT NULL, teacher_id INT DEFAULT NULL, instrument_id INT DEFAULT NULL, INDEX IDX_F87474F39C24126 (day_id), INDEX IDX_F87474F3B5937BF9 (hour_id), INDEX IDX_F87474F341807E1D (teacher_id), INDEX IDX_F87474F3CF11D9C (instrument_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F39C24126 FOREIGN KEY (day_id) REFERENCES day (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3B5937BF9 FOREIGN KEY (hour_id) REFERENCES hour (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F341807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3CF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE lesson');
    }
}
