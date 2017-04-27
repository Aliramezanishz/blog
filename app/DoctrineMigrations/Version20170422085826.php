<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170422085826 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE genus_scientist DROP FOREIGN KEY FK_66CF3FA885C4074C');
        $this->addSql('ALTER TABLE genus_scientist DROP FOREIGN KEY FK_66CF3FA8A76ED395');
        $this->addSql('ALTER TABLE genus_scientist DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE genus_scientist ADD id INT AUTO_INCREMENT NOT NULL, ADD years_studied INT NOT NULL');
        $this->addSql('ALTER TABLE genus_scientist ADD CONSTRAINT FK_66CF3FA885C4074C FOREIGN KEY (genus_id) REFERENCES genus (id)');
        $this->addSql('ALTER TABLE genus_scientist ADD CONSTRAINT FK_66CF3FA8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE genus_scientist ADD PRIMARY KEY (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE genus_scientist MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE genus_scientist DROP FOREIGN KEY FK_66CF3FA885C4074C');
        $this->addSql('ALTER TABLE genus_scientist DROP FOREIGN KEY FK_66CF3FA8A76ED395');
        $this->addSql('ALTER TABLE genus_scientist DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE genus_scientist DROP id, DROP years_studied');
        $this->addSql('ALTER TABLE genus_scientist ADD CONSTRAINT FK_66CF3FA885C4074C FOREIGN KEY (genus_id) REFERENCES genus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genus_scientist ADD CONSTRAINT FK_66CF3FA8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genus_scientist ADD PRIMARY KEY (genus_id, user_id)');
    }
}
