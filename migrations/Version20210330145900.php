<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210330145900 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admins (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, events_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(3000) NOT NULL, created_at DATETIME NOT NULL, note DOUBLE PRECISION NOT NULL, INDEX IDX_9474526C67B3B43D (users_id), INDEX IDX_9474526C9D6A1065 (events_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE events (id INT AUTO_INCREMENT NOT NULL, admin_id INT DEFAULT NULL, event_type_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(5000) NOT NULL, image VARCHAR(255) NOT NULL, start_day DATE NOT NULL, end_day DATE NOT NULL, start_time TIME NOT NULL, end_time TIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_5387574A642B8210 (admin_id), INDEX IDX_5387574A401B253C (event_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line_up (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, rank VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line_up_events (line_up_id INT NOT NULL, events_id INT NOT NULL, INDEX IDX_77B69761FAAB039F (line_up_id), INDEX IDX_77B697619D6A1065 (events_id), PRIMARY KEY(line_up_id, events_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, line_up_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, pseudo VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(255) NOT NULL, rank VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL, role VARCHAR(255) NOT NULL, INDEX IDX_1483A5E9FAAB039F (line_up_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9D6A1065 FOREIGN KEY (events_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A642B8210 FOREIGN KEY (admin_id) REFERENCES admins (id)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A401B253C FOREIGN KEY (event_type_id) REFERENCES event_type (id)');
        $this->addSql('ALTER TABLE line_up_events ADD CONSTRAINT FK_77B69761FAAB039F FOREIGN KEY (line_up_id) REFERENCES line_up (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE line_up_events ADD CONSTRAINT FK_77B697619D6A1065 FOREIGN KEY (events_id) REFERENCES events (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9FAAB039F FOREIGN KEY (line_up_id) REFERENCES line_up (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A642B8210');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A401B253C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9D6A1065');
        $this->addSql('ALTER TABLE line_up_events DROP FOREIGN KEY FK_77B697619D6A1065');
        $this->addSql('ALTER TABLE line_up_events DROP FOREIGN KEY FK_77B69761FAAB039F');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9FAAB039F');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C67B3B43D');
        $this->addSql('DROP TABLE admins');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE event_type');
        $this->addSql('DROP TABLE events');
        $this->addSql('DROP TABLE line_up');
        $this->addSql('DROP TABLE line_up_events');
        $this->addSql('DROP TABLE users');
    }
}
