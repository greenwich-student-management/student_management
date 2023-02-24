<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230224101324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classmanagement ADD CONSTRAINT FK_2D0DAB6DE93695C7 FOREIGN KEY (major_id) REFERENCES major (id)');
        $this->addSql('CREATE INDEX IDX_2D0DAB6DE93695C7 ON classmanagement (major_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classmanagement DROP FOREIGN KEY FK_2D0DAB6DE93695C7');
        $this->addSql('DROP INDEX IDX_2D0DAB6DE93695C7 ON classmanagement');
    }
}
