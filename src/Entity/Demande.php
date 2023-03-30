<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\OffreRepository;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Demande
{
      #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    
    private ?int $iddemande = null;
    
       

    #[ORM\Column(length: 225) ]
private ?string  $descriptiondemande = null;


#[ORM\Column]

private ?int $idpersonne = null;
  

#[ORM\Column]
private ?float $prix= null;

#[ORM\OneToOne (inversed8y: 'Offre')]
private ?Categorieoffre $idoffre = null;
#[ORM\OneToOne (inversed8y: 'Colis')]
private ?Categorieoffre $idcolis = null;


    public function getIddemande(): ?int
    {
        return $this->iddemande;
    }

    public function getDescriptiondemande(): ?string
    {
        return $this->descriptiondemande;
    }

    public function setDescriptiondemande(string $descriptiondemande): self
    {
        $this->descriptiondemande = $descriptiondemande;

        return $this;
    }

    public function getIdpersonne(): ?int
    {
        return $this->idpersonne;
    }

    public function setIdpersonne(int $idpersonne): self
    {
        $this->idpersonne = $idpersonne;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdoffre(): ?Offre
    {
        return $this->idoffre;
    }

    public function setIdoffre(?Offre $idoffre): self
    {
        $this->idoffre = $idoffre;

        return $this;
    }

    public function getIdcolis(): ?Colis
    {
        return $this->idcolis;
    }

    public function setIdcolis(?Colis $idcolis): self
    {
        $this->idcolis = $idcolis;

        return $this;
    }


}
