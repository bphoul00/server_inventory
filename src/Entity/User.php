<?php

namespace App\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="user_id",type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $clientId;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $password;

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

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
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
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     */
    public function setClientId($clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string|null
     */
    public function getUsername() :?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     */
    public function getPassword() : ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
