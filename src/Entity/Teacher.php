<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $lastnameTeacher;

    #[ORM\Column(type: 'string', length: 50)]
    private $firstnameTeacher;

    #[ORM\Column(type: 'string', length: 10)]
    private $phoneTeacher;

    #[ORM\OneToMany(mappedBy: 'teacher', targetEntity: Lesson::class)]
    private $lessons;

    public function __construct()
    {
        $this->lessons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastnameTeacher(): ?string
    {
        return $this->lastnameTeacher;
    }

    public function setLastnameTeacher(string $lastnameTeacher): self
    {
        $this->lastnameTeacher = $lastnameTeacher;

        return $this;
    }

    public function getFirstnameTeacher(): ?string
    {
        return $this->firstnameTeacher;
    }

    public function setFirstnameTeacher(string $firstnameTeacher): self
    {
        $this->firstnameTeacher = $firstnameTeacher;

        return $this;
    }

    public function getPhoneTeacher(): ?string
    {
        return $this->phoneTeacher;
    }

    public function setPhoneTeacher(string $phoneTeacher): self
    {
        $this->phoneTeacher = $phoneTeacher;

        return $this;
    }

    /**
     * @return Collection<int, Lesson>
     */
    public function getLessons(): Collection
    {
        return $this->lessons;
    }

    public function addLesson(Lesson $lesson): self
    {
        if (!$this->lessons->contains($lesson)) {
            $this->lessons[] = $lesson;
            $lesson->setTeacher($this);
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        if ($this->lessons->removeElement($lesson)) {
            // set the owning side to null (unless already changed)
            if ($lesson->getTeacher() === $this) {
                $lesson->setTeacher(null);
            }
        }

        return $this;
    }
}
