<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201117095326 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sollicitatie (id INT AUTO_INCREMENT NOT NULL, vacature_id INT NOT NULL, kandidaat_id INT NOT NULL, werkgever_id INT NOT NULL, datetime DATETIME NOT NULL, uitgenodigd SMALLINT NOT NULL, INDEX IDX_9577817D6FB89BA0 (vacature_id), INDEX IDX_9577817DD714D977 (kandidaat_id), INDEX IDX_9577817DF1317686 (werkgever_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vacature (id INT AUTO_INCREMENT NOT NULL, platform_id INT NOT NULL, werkgever_id INT NOT NULL, titel VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, datum DATE NOT NULL, tekst VARCHAR(5000) NOT NULL, INDEX IDX_9E5830F5FFE6496F (platform_id), INDEX IDX_9E5830F5F1317686 (werkgever_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sollicitatie ADD CONSTRAINT FK_9577817D6FB89BA0 FOREIGN KEY (vacature_id) REFERENCES vacature (id)');
        $this->addSql('ALTER TABLE sollicitatie ADD CONSTRAINT FK_9577817DD714D977 FOREIGN KEY (kandidaat_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sollicitatie ADD CONSTRAINT FK_9577817DF1317686 FOREIGN KEY (werkgever_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vacature ADD CONSTRAINT FK_9E5830F5FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id)');
        $this->addSql('ALTER TABLE vacature ADD CONSTRAINT FK_9E5830F5F1317686 FOREIGN KEY (werkgever_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sollicitatie DROP FOREIGN KEY FK_9577817D6FB89BA0');
        $this->addSql('DROP TABLE sollicitatie');
        $this->addSql('DROP TABLE vacature');
    }
}
