<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261112160807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blacklist (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE credit (id INT AUTO_INCREMENT NOT NULL, auteur VARCHAR(100) NOT NULL, lien_source VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, credit_id INT NOT NULL, INDEX IDX_C53D045FCE062FF9 (credit_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE image_question (image_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_3907C7E63DA5256D (image_id), INDEX IDX_3907C7E61E27F6BF (question_id), PRIMARY KEY (image_id, question_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FCE062FF9 FOREIGN KEY (credit_id) REFERENCES credit (id)');
        $this->addSql('ALTER TABLE image_question ADD CONSTRAINT FK_3907C7E63DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_question ADD CONSTRAINT FK_3907C7E61E27F6BF FOREIGN KEY (question_id) REFERENCES tbl_question (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FCE062FF9');
        $this->addSql('ALTER TABLE image_question DROP FOREIGN KEY FK_3907C7E63DA5256D');
        $this->addSql('ALTER TABLE image_question DROP FOREIGN KEY FK_3907C7E61E27F6BF');
        $this->addSql('DROP TABLE blacklist');
        $this->addSql('DROP TABLE credit');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE image_question');
        $this->addSql('DROP TABLE user');
    }
}
