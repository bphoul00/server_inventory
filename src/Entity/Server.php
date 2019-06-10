<?php

namespace App\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServerRepository")
 */
class Server
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="server_id",type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $creationDate;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $modificationDate;

    public function __construct()
    {
        $this->active = true;
        $this->creationDate = Carbon::now();
        $this->modificationDate = Carbon::now();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getAddress() : ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param  $creationDate
     */
    public function setCreationDate($creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @param  $modificationDate
     */
    public function setModificationDate($modificationDate): void
    {
        $this->modificationDate = $modificationDate;
    }
}
