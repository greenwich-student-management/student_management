<?php

namespace App\Entity;

use App\Repository\ClassmanagementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassmanagementRepository::class)]
class Classmanagement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $classname = null;

    #[ORM\Column(length: 255)]
    private ?string $classcode = null;

    #[ORM\OneToMany(mappedBy: 'class', targetEntity: Study::class)]
    private Collection $studies;

    #[ORM\ManyToOne(inversedBy: 'classmanagements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Major $major = null;

    public function __construct()
    {
        $this->studies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassname(): ?string
    {
        return $this->classname;
    }

    public function setClassname(string $classname): self
    {
        $this->classname = $classname;

        return $this;
    }

    public function getClasscode(): ?string
    {
        return $this->classcode;
    }

    public function setClasscode(string $classcode): self
    {
        $this->classcode = $classcode;

        return $this;
    }

    /**
     * @return Collection<int, Study>
     */
    public function getStudies(): Collection
    {
        return $this->studies;
    }

    public function addStudy(Study $study): self
    {
        if (!$this->studies->contains($study)) {
            $this->studies->add($study);
            $study->setClass($this);
        }

        return $this;
    }

    public function removeStudy(Study $study): self
    {
        if ($this->studies->removeElement($study)) {
            // set the owning side to null (unless already changed)
            if ($study->getClass() === $this) {
                $study->setClass(null);
            }
        }

        return $this;
    }

    public function getMajor(): ?Major
    {
        return $this->major;
    }

    public function setMajor(?Major $major): self
    {
        $this->major = $major;

        return $this;
    }
    public function __toString()
    {
        return $this->classname;
    }
}
