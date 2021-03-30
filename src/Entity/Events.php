<?php

namespace App\Entity;

use App\Repository\EventsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventsRepository::class)
 */
class Events
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=5000)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="date")
     */
    private $start_day;

    /**
     * @ORM\Column(type="date")
     */
    private $end_day;

    /**
     * @ORM\Column(type="time")
     */
    private $start_time;

    /**
     * @ORM\Column(type="time")
     */
    private $end_time;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="event")
     */
    private $comments;

    /**
     * @ORM\ManyToMany(targetEntity=LineUp::class, mappedBy="event")
     */
    private $line_up;

    /**
     * @ORM\ManyToOne(targetEntity=Admins::class, inversedBy="events")
     */
    private $admin;

    /**
     * @ORM\ManyToOne(targetEntity=EventType::class, inversedBy="events")
     */
    private $event_type;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->line_up = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getStartDay(): ?\DateTimeInterface
    {
        return $this->start_day;
    }

    public function setStartDay(\DateTimeInterface $start_day): self
    {
        $this->start_day = $start_day;

        return $this;
    }

    public function getEndDay(): ?\DateTimeInterface
    {
        return $this->end_day;
    }

    public function setEndDay(\DateTimeInterface $end_day): self
    {
        $this->end_day = $end_day;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->start_time;
    }

    public function setStartTime(\DateTimeInterface $start_time): self
    {
        $this->start_time = $start_time;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->end_time;
    }

    public function setEndTime(\DateTimeInterface $end_time): self
    {
        $this->end_time = $end_time;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setEvent($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getEvent() === $this) {
                $comment->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LineUp[]
     */
    public function getLineUp(): Collection
    {
        return $this->line_up;
    }

    public function addLineUp(LineUp $lineUp): self
    {
        if (!$this->line_up->contains($lineUp)) {
            $this->line_up[] = $lineUp;
            $lineUp->addEvent($this);
        }

        return $this;
    }

    public function removeLineUp(LineUp $lineUp): self
    {
        if ($this->line_up->removeElement($lineUp)) {
            $lineUp->removeEvent($this);
        }

        return $this;
    }

    public function getAdmin(): ?Admins
    {
        return $this->admin;
    }

    public function setAdmin(?Admins $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getEventType(): ?EventType
    {
        return $this->event_type;
    }

    public function setEventType(?EventType $event_type): self
    {
        $this->event_type = $event_type;

        return $this;
    }
}
