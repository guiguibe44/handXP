<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200305205828 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE exercice_categorie DROP FOREIGN KEY FK_EBB23D22BCF5E72D');
        $this->addSql('ALTER TABLE category_exercise DROP FOREIGN KEY FK_19A0516712469DE2');
        $this->addSql('ALTER TABLE exercice_categorie DROP FOREIGN KEY FK_EBB23D2289D40298');
        $this->addSql('ALTER TABLE exercice_niveau DROP FOREIGN KEY FK_9250247189D40298');
        $this->addSql('ALTER TABLE exercice_poste DROP FOREIGN KEY FK_2504C94289D40298');
        $this->addSql('ALTER TABLE exercice_type DROP FOREIGN KEY FK_B225A95589D40298');
        $this->addSql('ALTER TABLE category_exercise DROP FOREIGN KEY FK_19A05167E934951A');
        $this->addSql('ALTER TABLE level_exercise DROP FOREIGN KEY FK_237370CCE934951A');
        $this->addSql('ALTER TABLE position_exercise DROP FOREIGN KEY FK_8AFD87ABE934951A');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51C59DDEB4F');
        $this->addSql('ALTER TABLE level_exercise DROP FOREIGN KEY FK_237370CC5FB14BA7');
        $this->addSql('ALTER TABLE exercice_niveau DROP FOREIGN KEY FK_92502471B3E9C81');
        $this->addSql('ALTER TABLE position_exercise DROP FOREIGN KEY FK_8AFD87ABDD842E46');
        $this->addSql('ALTER TABLE exercice_poste DROP FOREIGN KEY FK_2504C942A0905086');
        $this->addSql('ALTER TABLE exercice_type DROP FOREIGN KEY FK_B225A955C54C8C93');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74D60BB6FE6');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_exercise');
        $this->addSql('DROP TABLE exercice');
        $this->addSql('DROP TABLE exercice_categorie');
        $this->addSql('DROP TABLE exercice_niveau');
        $this->addSql('DROP TABLE exercice_poste');
        $this->addSql('DROP TABLE exercice_type');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('DROP TABLE exercise_level');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE level_exercise');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE position_exercise');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(512) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE category_exercise (category_id INT NOT NULL, exercise_id INT NOT NULL, INDEX IDX_19A05167E934951A (exercise_id), INDEX IDX_19A0516712469DE2 (category_id), PRIMARY KEY(category_id, exercise_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE exercice (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, nom VARCHAR(1024) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, numero INT DEFAULT NULL, nb_participant INT DEFAULT NULL, nb_gardien INT DEFAULT NULL, duree INT DEFAULT NULL, objectif LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, conseil LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, mise_en_place LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, consigne LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, regulation LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, gratuit TINYINT(1) DEFAULT \'NULL\', statut INT NOT NULL, INDEX IDX_E418C74D60BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE exercice_categorie (exercice_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_EBB23D22BCF5E72D (categorie_id), INDEX IDX_EBB23D2289D40298 (exercice_id), PRIMARY KEY(exercice_id, categorie_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE exercice_niveau (exercice_id INT NOT NULL, niveau_id INT NOT NULL, INDEX IDX_92502471B3E9C81 (niveau_id), INDEX IDX_9250247189D40298 (exercice_id), PRIMARY KEY(exercice_id, niveau_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE exercice_poste (exercice_id INT NOT NULL, poste_id INT NOT NULL, INDEX IDX_2504C942A0905086 (poste_id), INDEX IDX_2504C94289D40298 (exercice_id), PRIMARY KEY(exercice_id, poste_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE exercice_type (exercice_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_B225A955C54C8C93 (type_id), INDEX IDX_B225A95589D40298 (exercice_id), PRIMARY KEY(exercice_id, type_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE exercise (id INT AUTO_INCREMENT NOT NULL, exercise_level_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, target VARCHAR(1024) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, setup VARCHAR(2048) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, instruction VARCHAR(2048) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, regulation VARCHAR(2048) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, advice VARCHAR(2048) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, duration INT DEFAULT NULL, participant_nb INT DEFAULT NULL, goalkeeper_nb INT DEFAULT NULL, INDEX IDX_AEDAD51C59DDEB4F (exercise_level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE exercise_level (id INT AUTO_INCREMENT NOT NULL, title INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE level_exercise (level_id INT NOT NULL, exercise_id INT NOT NULL, INDEX IDX_237370CCE934951A (exercise_id), INDEX IDX_237370CC5FB14BA7 (level_id), PRIMARY KEY(level_id, exercise_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE position (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE position_exercise (position_id INT NOT NULL, exercise_id INT NOT NULL, INDEX IDX_8AFD87ABE934951A (exercise_id), INDEX IDX_8AFD87ABDD842E46 (position_id), PRIMARY KEY(position_id, exercise_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, firstname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(1024) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_exercise ADD CONSTRAINT FK_19A0516712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_exercise ADD CONSTRAINT FK_19A05167E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74D60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE exercice_categorie ADD CONSTRAINT FK_EBB23D2289D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exercice_categorie ADD CONSTRAINT FK_EBB23D22BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exercice_niveau ADD CONSTRAINT FK_9250247189D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exercice_niveau ADD CONSTRAINT FK_92502471B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exercice_poste ADD CONSTRAINT FK_2504C94289D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exercice_poste ADD CONSTRAINT FK_2504C942A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exercice_type ADD CONSTRAINT FK_B225A95589D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exercice_type ADD CONSTRAINT FK_B225A955C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51C59DDEB4F FOREIGN KEY (exercise_level_id) REFERENCES exercise_level (id)');
        $this->addSql('ALTER TABLE level_exercise ADD CONSTRAINT FK_237370CC5FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE level_exercise ADD CONSTRAINT FK_237370CCE934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position_exercise ADD CONSTRAINT FK_8AFD87ABDD842E46 FOREIGN KEY (position_id) REFERENCES position (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE position_exercise ADD CONSTRAINT FK_8AFD87ABE934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id) ON DELETE CASCADE');
    }
}
