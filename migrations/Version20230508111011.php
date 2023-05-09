<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230508111011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE price_plan (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price_plan_price_plan_feature (price_plan_id INT NOT NULL, price_plan_feature_id INT NOT NULL, INDEX IDX_CEA636C583BFCAC7 (price_plan_id), INDEX IDX_CEA636C5CFE5157D (price_plan_feature_id), PRIMARY KEY(price_plan_id, price_plan_feature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price_plan_benefit (id INT AUTO_INCREMENT NOT NULL, price_plan_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, INDEX IDX_16E7240A83BFCAC7 (price_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price_plan_feature (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE price_plan_price_plan_feature ADD CONSTRAINT FK_CEA636C583BFCAC7 FOREIGN KEY (price_plan_id) REFERENCES price_plan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE price_plan_price_plan_feature ADD CONSTRAINT FK_CEA636C5CFE5157D FOREIGN KEY (price_plan_feature_id) REFERENCES price_plan_feature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE price_plan_benefit ADD CONSTRAINT FK_16E7240A83BFCAC7 FOREIGN KEY (price_plan_id) REFERENCES price_plan (id)');

        $this->addSql("INSERT INTO price_plan (name, price) VALUES ('Free', 0)");
        $this->addSql("INSERT INTO price_plan (name, price) VALUES ('Basic', 100)");
        $this->addSql("INSERT INTO price_plan (name, price) VALUES ('Premium', 200)");
        $this->addSql("INSERT INTO price_plan (name, price) VALUES ('Enterprise', 300)");

        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (1, '10 users included')");
        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (1, '2 GB of storage')");
        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (1, 'Email support')");
        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (1, 'Help center access')");

        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (2, '20 users included')");
        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (2, '10 GB of storage')");
        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (2, 'Priority email support')");
        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (2, 'Help center access')");

        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (3, '30 users included')");
        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (3, '15 GB of storage')");
        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (3, 'Phone & email support')");
        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (3, 'Help center access')");

        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (4, '50 users included')");
        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (4, '30 GB of storage')");
        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (4, 'Phone & email support')");
        $this->addSql("INSERT INTO price_plan_benefit (price_plan_id, name) VALUES (4, 'Help center access')");

        $this->addSql("INSERT INTO price_plan_feature (name) VALUES ('Public')");
        $this->addSql("INSERT INTO price_plan_feature (name) VALUES ('Private')");
        $this->addSql("INSERT INTO price_plan_feature (name) VALUES ('Permission')");
        $this->addSql("INSERT INTO price_plan_feature (name) VALUES ('Customization')");
        $this->addSql("INSERT INTO price_plan_feature (name) VALUES ('Integration')");
        $this->addSql("INSERT INTO price_plan_feature (name) VALUES ('Security')");
        $this->addSql("INSERT INTO price_plan_feature (name) VALUES ('Support')");
        $this->addSql("INSERT INTO price_plan_feature (name) VALUES ('Analytics')");

        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (1, 1)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (1, 2)");

        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (2, 1)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (2, 2)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (2, 3)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (2, 4)");

        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (3, 1)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (3, 2)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (3, 3)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (3, 4)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (3, 5)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (3, 6)");

        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (4, 1)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (4, 2)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (4, 3)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (4, 4)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (4, 5)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (4, 6)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (4, 7)");
        $this->addSql("INSERT INTO price_plan_price_plan_feature (price_plan_id, price_plan_feature_id) VALUES (4, 8)");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE price_plan_price_plan_feature DROP FOREIGN KEY FK_CEA636C583BFCAC7');
        $this->addSql('ALTER TABLE price_plan_price_plan_feature DROP FOREIGN KEY FK_CEA636C5CFE5157D');
        $this->addSql('ALTER TABLE price_plan_benefit DROP FOREIGN KEY FK_16E7240A83BFCAC7');
        $this->addSql('DROP TABLE price_plan');
        $this->addSql('DROP TABLE price_plan_price_plan_feature');
        $this->addSql('DROP TABLE price_plan_benefit');
        $this->addSql('DROP TABLE price_plan_feature');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
