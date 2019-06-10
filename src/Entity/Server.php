<?php

namespace App\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
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
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $clientId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @var Carbon
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $creationDate;

    /**
     * @var Carbon
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
    public function getClientId() : ?string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
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

    /**
     * @return array
     */
    public function toArray()
    {
        $arr = [
            "id" => $this->getId(),
            "clientId" => $this->getClientId()
        ];
        return $arr;
    }
}
