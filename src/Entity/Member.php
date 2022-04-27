<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemberRepository::class)]
class Member
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $lastnameMember;

    #[ORM\Column(type: 'string', length: 50)]
    private $firstnameMember;

    #[ORM\Column(type: 'string', length: 10)]
    private $phoneMember;

    #[ORM\ManyToMany(targetEntity: Lesson::class, inversedBy: 'members')]
    private $lesson;

    public function __construct()
    {
        $this->lesson = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastnameMember(): ?string
    {
        return $this->lastnameMember;
    }

    public function setLastnameMember(string $lastnameMember): self
    {
        $this->lastnameMember = $lastnameMember;

        return $this;
    }

    public function getFirstnameMember(): ?string
    {
        return $this->firstnameMember;
    }

    public function setFirstnameMember(string $firstnameMember): self
    {
        $this->firstnameMember = $firstnameMember;

        return $this;
    }

    public function getPhoneMember(): ?string
    {
        return $this->phoneMember;
    }

    public function setPhoneMember(string $phoneMember): self
    {
        $this->phoneMember = $phoneMember;

        return $this;
    }

    /**
     * @return Collection<int, Lesson>
     */
    public function getLesson(): Collection
    {
        return $this->lesson;
    }

    public function addLesson(Lesson $lesson): self
    {
        if (!$this->lesson->contains($lesson)) {
            $this->lesson[] = $lesson;
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        $this->lesson->removeElement($lesson);

        return $this;
    }
}
