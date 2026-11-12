<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261112165254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tbl_blacklist (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tbl_credit (id INT AUTO_INCREMENT NOT NULL, auteur VARCHAR(100) NOT NULL, lien_source VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tbl_image (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, credit_id INT NOT NULL, INDEX IDX_6B594E40CE062FF9 (credit_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tbl_slide (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, position INT NOT NULL, slide_show_id INT DEFAULT NULL, INDEX IDX_DC8BA47D1D87D6D (slide_show_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE slide_image (slide_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_44B4D27CDD5AFB87 (slide_id), INDEX IDX_44B4D27C3DA5256D (image_id), PRIMARY KEY (slide_id, image_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tbl_slideshow (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, theme_id INT DEFAULT NULL, INDEX IDX_22388B8359027487 (theme_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE slide_show_image (slide_show_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_8EAE5A171D87D6D (slide_show_id), INDEX IDX_8EAE5A173DA5256D (image_id), PRIMARY KEY (slide_show_id, image_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE tbl_image ADD CONSTRAINT FK_6B594E40CE062FF9 FOREIGN KEY (credit_id) REFERENCES tbl_credit (id)');
        $this->addSql('ALTER TABLE tbl_slide ADD CONSTRAINT FK_DC8BA47D1D87D6D FOREIGN KEY (slide_show_id) REFERENCES tbl_slideshow (id)');
        $this->addSql('ALTER TABLE slide_image ADD CONSTRAINT FK_44B4D27CDD5AFB87 FOREIGN KEY (slide_id) REFERENCES tbl_slide (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE slide_image ADD CONSTRAINT FK_44B4D27C3DA5256D FOREIGN KEY (image_id) REFERENCES tbl_image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tbl_slideshow ADD CONSTRAINT FK_22388B8359027487 FOREIGN KEY (theme_id) REFERENCES tbl_theme (id)');
        $this->addSql('ALTER TABLE slide_show_image ADD CONSTRAINT FK_8EAE5A171D87D6D FOREIGN KEY (slide_show_id) REFERENCES tbl_slideshow (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE slide_show_image ADD CONSTRAINT FK_8EAE5A173DA5256D FOREIGN KEY (image_id) REFERENCES tbl_image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY `FK_C53D045FCE062FF9`');
        $this->addSql('DROP TABLE blacklist');
        $this->addSql('DROP TABLE credit');
        $this->addSql('DROP TABLE image');
        $this->addSql('ALTER TABLE image_question DROP FOREIGN KEY `FK_3907C7E63DA5256D`');
        $this->addSql('ALTER TABLE image_question ADD CONSTRAINT FK_3907C7E63DA5256D FOREIGN KEY (image_id) REFERENCES tbl_image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blacklist (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_uca1400_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE credit (id INT AUTO_INCREMENT NOT NULL, auteur VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, lien_source VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_uca1400_ai_ci`, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_uca1400_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, credit_id INT NOT NULL, INDEX IDX_C53D045FCE062FF9 (credit_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_uca1400_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT `FK_C53D045FCE062FF9` FOREIGN KEY (credit_id) REFERENCES credit (id)');
        $this->addSql('ALTER TABLE tbl_image DROP FOREIGN KEY FK_6B594E40CE062FF9');
        $this->addSql('ALTER TABLE tbl_slide DROP FOREIGN KEY FK_DC8BA47D1D87D6D');
        $this->addSql('ALTER TABLE slide_image DROP FOREIGN KEY FK_44B4D27CDD5AFB87');
        $this->addSql('ALTER TABLE slide_image DROP FOREIGN KEY FK_44B4D27C3DA5256D');
        $this->addSql('ALTER TABLE tbl_slideshow DROP FOREIGN KEY FK_22388B8359027487');
        $this->addSql('ALTER TABLE slide_show_image DROP FOREIGN KEY FK_8EAE5A171D87D6D');
        $this->addSql('ALTER TABLE slide_show_image DROP FOREIGN KEY FK_8EAE5A173DA5256D');
        $this->addSql('DROP TABLE tbl_blacklist');
        $this->addSql('DROP TABLE tbl_credit');
        $this->addSql('DROP TABLE tbl_image');
        $this->addSql('DROP TABLE tbl_slide');
        $this->addSql('DROP TABLE slide_image');
        $this->addSql('DROP TABLE tbl_slideshow');
        $this->addSql('DROP TABLE slide_show_image');
        $this->addSql('ALTER TABLE image_question DROP FOREIGN KEY FK_3907C7E63DA5256D');
        $this->addSql('ALTER TABLE image_question ADD CONSTRAINT `FK_3907C7E63DA5256D` FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user DROP is_verified');
    }
}
