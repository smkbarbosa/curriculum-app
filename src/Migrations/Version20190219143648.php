<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190219143648 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE historico_profissional ADD atribuicoes VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE candidato CHANGE cargo_id cargo_id INT DEFAULT NULL, CHANGE endereco_id endereco_id INT DEFAULT NULL, CHANGE historico_id historico_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tecnologias CHANGE candidato_id candidato_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidato CHANGE cargo_id cargo_id INT DEFAULT NULL, CHANGE endereco_id endereco_id INT DEFAULT NULL, CHANGE historico_id historico_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historico_profissional DROP atribuicoes');
        $this->addSql('ALTER TABLE tecnologias CHANGE candidato_id candidato_id INT DEFAULT NULL');
    }
}
