<?php

namespace App\Entity;

use App\Repository\SollicitatieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SollicitatieRepository::class)
 */
class Sollicitatie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=vacature::class, inversedBy="sollicitaties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vacature;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="sollicitaties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $kandidaat;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="sollicitaties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $werkgever;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime;

    /**
     * @ORM\Column(type="smallint")
     */
    private $uitgenodigd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVacature(): ?vacature
    {
        return $this->vacature;
    }

    public function setVacature(?vacature $vacature): self
    {
        $this->vacature = $vacature;

        return $this;
    }

    public function getKandidaat(): ?user
    {
        return $this->kandidaat;
    }

    public function setKandidaat(?user $kandidaat): self
    {
        $this->kandidaat = $kandidaat;

        return $this;
    }

    public function getWerkgever(): ?user
    {
        return $this->werkgever;
    }

    public function setWerkgever(?user $werkgever): self
    {
        $this->werkgever = $werkgever;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getUitgenodigd(): ?int
    {
        return $this->uitgenodigd;
    }

    public function setUitgenodigd(int $uitgenodigd): self
    {
        $this->uitgenodigd = $uitgenodigd;

        return $this;
    }
}
