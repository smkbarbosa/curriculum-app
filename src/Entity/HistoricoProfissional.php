<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HistoricoProfissionalRepository")
 */
class HistoricoProfissional
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomeEmpresa;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dataEntrada;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dataSaida;

    /**
     * @ORM\Column(type="boolean")
     */
    private $empregoAtual;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $atribuicoes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomeEmpresa(): ?string
    {
        return $this->nomeEmpresa;
    }

    public function setNomeEmpresa(string $nomeEmpresa): self
    {
        $this->nomeEmpresa = $nomeEmpresa;

        return $this;
    }

    public function getDataEntrada(): ?\DateTimeInterface
    {
        return $this->dataEntrada;
    }

    public function setDataEntrada(\DateTimeInterface $dataEntrada): self
    {
        $this->dataEntrada = $dataEntrada;

        return $this;
    }

    public function getDataSaida(): ?\DateTimeInterface
    {
        return $this->dataSaida;
    }

    public function setDataSaida(\DateTimeInterface $dataSaida): self
    {
        $this->dataSaida = $dataSaida;

        return $this;
    }

    public function getEmpregoAtual(): ?bool
    {
        return $this->empregoAtual;
    }

    public function setEmpregoAtual(bool $empregoAtual): self
    {
        $this->empregoAtual = $empregoAtual;

        return $this;
    }

    public function getAtribuicoes(): ?string
    {
        return $this->atribuicoes;
    }

    public function setAtribuicoes(string $atribuicoes): self
    {
        $this->atribuicoes = $atribuicoes;

        return $this;
    }

}
