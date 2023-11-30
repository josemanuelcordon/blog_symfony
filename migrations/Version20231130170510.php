<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231130170510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post ADD creator_id INT NOT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D61220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D61220EA6 ON post (creator_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649356FBCC5');
        $this->addSql('DROP INDEX IDX_8D93D649356FBCC5 ON user');
        $this->addSql('ALTER TABLE user DROP user_posts_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D61220EA6');
        $this->addSql('DROP INDEX IDX_5A8A6C8D61220EA6 ON post');
        $this->addSql('ALTER TABLE post DROP creator_id');
        $this->addSql('ALTER TABLE user ADD user_posts_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649356FBCC5 FOREIGN KEY (user_posts_id) REFERENCES post (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649356FBCC5 ON user (user_posts_id)');
    }
}
