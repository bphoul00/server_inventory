<?php

namespace App\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ApplicationRepository")
 */
class Application
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="application_id",type="integer")
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
    private $applicationKey;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $authentication_key;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $password;

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

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
     * @return string|null
     */
    public function getClientId() : ?string
    {
        return $this->clientId;
    }

    /**
     * @param string  $clientId
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
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

    /**
     * @return string|null
     */
    public function getApplicationKey(): ?string
    {
        return $this->applicationKey;
    }

    /**
     * @param string $applicationKey
     */
    public function setApplicationKey(string $applicationKey): void
    {
        $this->applicationKey = $applicationKey;
    }

    /**
     * @return string|null
     */
    public function getAuthenticationKey() : ?string
    {
        return $this->authentication_key;
    }

    /**
     * @param string $authentication_key
     */
    public function setAuthenticationKey(string $authentication_key): void
    {
        $this->authentication_key = $authentication_key;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setCreationDate($creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    public function setModificationDate($modificationDate): void
    {
        $this->modificationDate = $modificationDate;
    }
}
