<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExerciceRepository")
 */
class Exercice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_participant;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_gardien;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $objectif;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $conseil;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $demarrage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $consigne;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $regulation;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $gratuit;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Type", inversedBy="exercices")
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Poste", inversedBy="exercices")
     */
    private $poste;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Categorie", inversedBy="exercices")
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Niveau", inversedBy="exercices")
     */
    private $niveau;

    public function __construct()
    {
        $this->type = new ArrayCollection();
        $this->poste = new ArrayCollection();
        $this->categorie = new ArrayCollection();
        $this->niveau = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(?int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNbParticipant(): ?int
    {
        return $this->nb_participant;
    }

    public function setNbParticipant(?int $nb_participant): self
    {
        $this->nb_participant = $nb_participant;

        return $this;
    }

    public function getNbGardien(): ?int
    {
        return $this->nb_gardien;
    }

    public function setNbGardien(?int $nb_gardien): self
    {
        $this->nb_gardien = $nb_gardien;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(?string $objectif): self
    {
        $this->objectif = $objectif;

        return $this;
    }

    public function getConseil(): ?string
    {
        return $this->conseil;
    }

    public function setConseil(?string $conseil): self
    {
        $this->conseil = $conseil;

        return $this;
    }

    public function getDemarrage(): ?string
    {
        return $this->demarrage;
    }

    public function setDemarrage(?string $demarrage): self
    {
        $this->demarrage = $demarrage;

        return $this;
    }

    public function getConsigne(): ?string
    {
        return $this->consigne;
    }

    public function setConsigne(?string $consigne): self
    {
        $this->consigne = $consigne;

        return $this;
    }

    public function getRegulation(): ?string
    {
        return $this->regulation;
    }

    public function setRegulation(?string $regulation): self
    {
        $this->regulation = $regulation;

        return $this;
    }

    public function getGratuit(): ?bool
    {
        return $this->gratuit;
    }

    public function setGratuit(?bool $gratuit): self
    {
        $this->gratuit = $gratuit;

        return $this;
    }


    /**
     * @return Collection|Type[]
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(Type $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        if ($this->type->contains($type)) {
            $this->type->removeElement($type);
        }

        return $this;
    }

    /**
     * @return Collection|Poste[]
     */
    public function getPoste(): Collection
    {
        return $this->poste;
    }

    public function addPoste(Poste $poste): self
    {
        if (!$this->poste->contains($poste)) {
            $this->poste[] = $poste;
        }

        return $this;
    }

    public function removePoste(Poste $poste): self
    {
        if ($this->poste->contains($poste)) {
            $this->poste->removeElement($poste);
        }

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Categorie $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
        }

        return $this;
    }

    public function removeCategorie(Categorie $categorie): self
    {
        if ($this->categorie->contains($categorie)) {
            $this->categorie->removeElement($categorie);
        }

        return $this;
    }

    /**
     * @return Collection|Niveau[]
     */
    public function getNiveau(): Collection
    {
        return $this->niveau;
    }

    public function addNiveau(Niveau $niveau): self
    {
        if (!$this->niveau->contains($niveau)) {
            $this->niveau[] = $niveau;
        }

        return $this;
    }

    public function removeNiveau(Niveau $niveau): self
    {
        if ($this->niveau->contains($niveau)) {
            $this->niveau->removeElement($niveau);
        }

        return $this;
    }
}
