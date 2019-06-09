<?php

namespace App\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotNull()
     */
    private $active;

    /**
     * @var Carbon
     * @ORM\Column(type="carbondatetime", nullable=false)
     */
    protected $creationDate;

    /**
     * @var Carbon
     * @ORM\Column(type="carbondatetime", nullable=false)
     */
    protected $modificationDate;

    public function __construct()
    {
        $this->creationDate = Carbon::now();
        $this->modificationDate = Carbon::now();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool|null
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return Carbon
     */
    public function getCreationDate(): Carbon
    {
        return $this->creationDate;
    }

    /**
     * @param Carbon $creationDate
     */
    public function setCreationDate(Carbon $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return Carbon
     */
    public function getModificationDate(): Carbon
    {
        return $this->modificationDate;
    }

    /**
     * @param Carbon $modificationDate
     */
    public function setModificationDate(Carbon $modificationDate): void
    {
        $this->modificationDate = $modificationDate;
    }
}
