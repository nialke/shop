<?php


namespace src\Model\Validation;


class ValidationStatus
{
    public const STATUS_SUCCESS = 'success';
    public const STATUS_ERROR = 'error';

    /**
     * STATUS_SUCCESS
     * STATUS_ERROR
     * @var string
     */
    private $status = null;

    /**
     * Status message array
     * @var array
     */
    private $messageList = [];

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        if($status == self::STATUS_SUCCESS || $status == self::STATUS_ERROR) {
            $this->status = $status;
        }
    }

    /**
     * @param string $info
     */
    public function setMessage(string $message): void //addMessage?
    {
        $this->messageList[] = $message;
    }

    /**
     * @param array $messageList
     */
    public function setMessageList(array $messageList): void
    {
        $this->messageList = $messageList;
    }

    /**
     * @return array
     */
    public function getMessageList(): array
    {
        return $this->messageList;
    }
}