<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CallendarRepository")
 */
class Callendar
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_created;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_book;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $date_key;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->date_created;
    }

    public function setDateCreated(?\DateTimeInterface $date_created): self
    {
        $this->date_created = $date_created;

        return $this;
    }

    public function getDateBook(): ?\DateTimeInterface
    {
        return $this->date_book;
    }

    public function setDateBook(?\DateTimeInterface $date_book): self
    {
        $this->date_book = $date_book;

        return $this;
    }

    public function getDateKey(): ?int
    {
        return $this->date_key;
    }

    public function setDateKey(?int $date_key): self
    {
        $this->date_key = $date_key;

        return $this;
    }
}
