<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210215140534 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_product (menu_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_5B911913CCD7E912 (menu_id), INDEX IDX_5B9119134584665A (product_id), PRIMARY KEY(menu_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE productMenu (id INT AUTO_INCREMENT NOT NULL, idMenu INT DEFAULT NULL, idProduct INT DEFAULT NULL, INDEX fk_idProductMenu (idProduct), INDEX fk_idMenu (idMenu), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu_product ADD CONSTRAINT FK_5B911913CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_product ADD CONSTRAINT FK_5B9119134584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE productMenu ADD CONSTRAINT FK_7073D848EF8640D FOREIGN KEY (idMenu) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE productMenu ADD CONSTRAINT FK_7073D848C3F36F5F FOREIGN KEY (idProduct) REFERENCES product (id)');
        $this->addSql('ALTER TABLE menu CHANGE description description VARCHAR(1000) NOT NULL');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD4B294BA7');
        $this->addSql('DROP INDEX fk_idNutrition ON product');
        $this->addSql('ALTER TABLE product CHANGE description description VARCHAR(1000) DEFAULT NULL, CHANGE image image VARCHAR(1000) DEFAULT NULL, CHANGE idnutrition nutrition_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADB5D724CD FOREIGN KEY (nutrition_id) REFERENCES infos_nutrition (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04ADB5D724CD ON product (nutrition_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE menu_product');
        $this->addSql('DROP TABLE productMenu');
        $this->addSql('ALTER TABLE menu CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADB5D724CD');
        $this->addSql('DROP INDEX UNIQ_D34A04ADB5D724CD ON product');
        $this->addSql('ALTER TABLE product CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nutrition_id idNutrition INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD4B294BA7 FOREIGN KEY (idNutrition) REFERENCES infos_nutrition (id)');
        $this->addSql('CREATE INDEX fk_idNutrition ON product (idNutrition)');
    }
}
