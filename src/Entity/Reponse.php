<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReclamationRepository;
use App\Entity\Utilisateur;
use App\Entity\Reclamation;
use ORM\Table;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]

/**
 * Reponse
 *
 * @ORM\Table(name="reponse", indexes={@ORM\Index(name="reponse_ibfk_1", columns={"id_reclamation"})})
 * @ORM\Entity
 */



class Reponse
{
   
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_reponse = null;
    
  

    #[ORM\Column(length: 250)]
    private ?string $text_rep = null;


    
    #[ORM\OneToOne(targetEntity: Reclamation::class, inversedBy: 'reponse')]
    #[ORM\JoinColumn(name: "id_reclamation", referencedColumnName: "id_reclamation")]
    protected $reclamation;


    public function getIdReponse(): ?int
    {
        return $this->id_reponse;
    }

    public function getTextRep(): ?string
    {
        return $this->text_rep;
    }

    public function setTextRep(string $text_rep): self
    {
        $this->text_rep = $text_rep;

        return $this;
    }

    public function getReclamation(): ?Reclamation
    {
        return $this->reclamation;
    }

    public function setReclamation(?Reclamation $reclamation): self
    {
        $this->reclamation = $reclamation;

        return $this;
    }




     }