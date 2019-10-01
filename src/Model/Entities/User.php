<?php

namespace src\Model\Entities;

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nick;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \DateTime
     */
    private $createDate;

    /**
     * @var int
     */
    private $type;

    public function __construct()
    {
        $this->defaultSettings();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNick(): string
    {
        return $this->nick;
    }

    /**
     * @param string $nick
     */
    public function setNick(string $nick)
    {
        $this->nick = $nick;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate(): \DateTime
    {
        return $this->createDate;
    }

    /**
     * @param \DateTime $createDate
     */
    public function setCreateDate(\DateTime $createDate): void
    {
        $this->createDate = $createDate;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * gives default create date
     */
    public function defaultSettings(): void
    {
        $this->createDate = new \DateTime(date("Y-m-d\TH:i:sP"));
    }

}
