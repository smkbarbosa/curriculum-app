<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidatoRepository")
 */
class Candidato
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
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idade;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dataNascimento;

    /**
     * @ORM\Column(type="float")
     */
    private $pretensaoSalarial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $foto;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Cargo", inversedBy="candidato", cascade={"persist", "remove"})
     */
    private $cargo;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Endereco", inversedBy="candidato", cascade={"persist", "remove"})
     */
    private $endereco;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\HistoricoProfissional", inversedBy="candidato", cascade={"persist", "remove"})
     */
    private $historico;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tecnologias", mappedBy="candidato")
     */
    private $tecnologias;

    public function __construct()
    {
        $this->tecnologias = new Tecnologias();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getIdade(): ?string
    {
        return $this->idade;
    }

    public function setIdade(string $idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getDataNascimento(): ?\DateTimeInterface
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(\DateTimeInterface $dataNascimento): self
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    public function getPretensaoSalarial(): ?float
    {
        return $this->pretensaoSalarial;
    }

    public function setPretensaoSalarial(float $pretensaoSalarial): self
    {
        $this->pretensaoSalarial = $pretensaoSalarial;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(UploadedFile $foto = null): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getCargo(): ?Cargo
    {
        return $this->cargo;
    }

    public function setCargo(?Cargo $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getEndereco(): ?Endereco
    {
        return $this->endereco;
    }

    public function setEndereco(?Endereco $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getHistorico(): ?HistoricoProfissional
    {
        return $this->historico;
    }

    public function setHistorico(?HistoricoProfissional $historico): self
    {
        $this->historico = $historico;

        return $this;
    }

    /**
     * @return Collection|Tecnologias[]
     */
    public function getTecnologias(): Tecnologias
    {
        return $this->tecnologias;
    }

    public function addTecnologia(Tecnologias $tecnologia): self
    {
        if (!$this->tecnologias->contains($tecnologia)) {
            $this->tecnologias[] = $tecnologia;
            $tecnologia->setCandidato($this);
        }

        return $this;
    }

    public function removeTecnologia(Tecnologias $tecnologia): self
    {
        if ($this->tecnologias->contains($tecnologia)) {
            $this->tecnologias->removeElement($tecnologia);
            // set the owning side to null (unless already changed)
            if ($tecnologia->getCandidato() === $this) {
                $tecnologia->setCandidato(null);
            }
        }

        return $this;
    }
}
