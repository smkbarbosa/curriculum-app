<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190219121933 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE historico_profissional (id INT AUTO_INCREMENT NOT NULL, nome_empresa VARCHAR(255) NOT NULL, data_entrada DATETIME NOT NULL, data_saida DATETIME NOT NULL, emprego_atual TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidato (id INT AUTO_INCREMENT NOT NULL, cargo_id INT DEFAULT NULL, endereco_id INT DEFAULT NULL, historico_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, idade VARCHAR(255) NOT NULL, sexo VARCHAR(255) NOT NULL, data_nascimento DATETIME NOT NULL, pretensao_salarial DOUBLE PRECISION NOT NULL, foto VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2867675A813AC380 (cargo_id), UNIQUE INDEX UNIQ_2867675A1BB76823 (endereco_id), UNIQUE INDEX UNIQ_2867675AB733030B (historico_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cargo (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tecnologias (id INT AUTO_INCREMENT NOT NULL, candidato_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, INDEX IDX_FF8A0685FE0067E5 (candidato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE endereco (id INT AUTO_INCREMENT NOT NULL, rua VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, bairro VARCHAR(255) NOT NULL, cidade VARCHAR(255) NOT NULL, estado VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidato ADD CONSTRAINT FK_2867675A813AC380 FOREIGN KEY (cargo_id) REFERENCES cargo (id)');
        $this->addSql('ALTER TABLE candidato ADD CONSTRAINT FK_2867675A1BB76823 FOREIGN KEY (endereco_id) REFERENCES endereco (id)');
        $this->addSql('ALTER TABLE candidato ADD CONSTRAINT FK_2867675AB733030B FOREIGN KEY (historico_id) REFERENCES historico_profissional (id)');
        $this->addSql('ALTER TABLE tecnologias ADD CONSTRAINT FK_FF8A0685FE0067E5 FOREIGN KEY (candidato_id) REFERENCES candidato (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidato DROP FOREIGN KEY FK_2867675AB733030B');
        $this->addSql('ALTER TABLE tecnologias DROP FOREIGN KEY FK_FF8A0685FE0067E5');
        $this->addSql('ALTER TABLE candidato DROP FOREIGN KEY FK_2867675A813AC380');
        $this->addSql('ALTER TABLE candidato DROP FOREIGN KEY FK_2867675A1BB76823');
        $this->addSql('DROP TABLE historico_profissional');
        $this->addSql('DROP TABLE candidato');
        $this->addSql('DROP TABLE cargo');
        $this->addSql('DROP TABLE tecnologias');
        $this->addSql('DROP TABLE endereco');
    }
}
