<?php


namespace src\Model\Validation;

use src\Model\Entities\User;
use src\Model\DatabaseRequests\UserRequests;

class UserValidation
{
    public function validateAdmin(?User $user):ValidationStatus
    {
        $status = new ValidationStatus();
        $status->setStatus(ValidationStatus::STATUS_SUCCESS);

        if ($user == NULL || $user->getType() != 1)
        {
            $status->setStatus(ValidationStatus::STATUS_ERROR);
            $status->setMessage("Użytkownik nie jest administratorem");
        }

        return $status;
    }

    public function validateUser(User $user): ValidationStatus
    {
        $status = new ValidationStatus();
        $status->setStatus("success");

        /**
         * @var ValidationStatus[]
         */
        $partsValidationStatus = [];
        $partsValidationStatus[] = $this->validateUserExist($user);
        $partsValidationStatus[] = $this->validatePasswordLength($user);
        $partsValidationStatus[] = $this->validateUserNickIncludeSpace($user);
        $partsValidationStatus[] = $this->validateUserLength($user);

        foreach ($partsValidationStatus as $index => $validationElement) {
            if($validationElement->getStatus() == ValidationStatus::STATUS_ERROR) {
                $status->setStatus(ValidationStatus::STATUS_ERROR);
                $errors = array_merge($status->getMessageList(), $validationElement->getMessageList());
                $status->setMessageList($errors);
            }
        }

        return $status;
    }

    public function validateLogin(User $user): ValidationStatus
    {
        $status = new ValidationStatus();
        $status->setStatus(ValidationStatus::STATUS_SUCCESS);

        $partsValidationStatus = [];
        $partsValidationStatus[] = $this->validateCorrectNickAndPassword($user);

        foreach ($partsValidationStatus as $index => $validationElement)
        {
            if ($validationElement->getStatus() == ValidationStatus::STATUS_ERROR)
                $status->setStatus(ValidationStatus::STATUS_ERROR);
                $errors = array_merge($status->getMessageList(), $validationElement->getMessageList());
                $status->setMessageList($errors);
        }

        return $status;
    }

    public function validateIsLogged (?User $user): ValidationStatus
    {
        $status = new ValidationStatus();
        $status->setStatus(ValidationStatus::STATUS_SUCCESS);
        if (isset($user) == false)
        {
            $status->setStatus(ValidationStatus::STATUS_ERROR);
            $status->setMessage("Użytkownik nie jest zalogowany");
        }
        return $status;
    }

    private function validateUserExist(User $user): ValidationStatus
    {
        $userExist = new UserRequests();
        $status = new ValidationStatus();
        $status->setStatus(ValidationStatus::STATUS_SUCCESS);

        if($userExist->userExist($user)) {
            $status->setStatus(ValidationStatus::STATUS_ERROR);
            $status->setMessage("Użytkownik o takim nicku już istnieje");
        }

        return $status;
    }

    private function validatePasswordLength(User $user): ValidationStatus
    {
        $status = new ValidationStatus();
        $status->setStatus(ValidationStatus::STATUS_SUCCESS);
        $passwordLength = strlen($user->getPassword());

        if ($passwordLength < 8 || $passwordLength > 32)
        {
            $status->setStatus(ValidationStatus::STATUS_ERROR);
            $status->setMessage("Hasło musi mieć minimum 8 znaków i maksimum 32 znaki");
        }

        return $status;
    }

    private function validateUserLength(User $user): ValidationStatus
    {
        $status = new ValidationStatus();
        $status->setStatus(ValidationStatus::STATUS_SUCCESS);

        $nickLength = strlen($user->getNick());
        if ($nickLength < 4 || $nickLength > 30)
        {
            $status->setStatus(ValidationStatus::STATUS_ERROR);
            $status->setMessage("Nick musi mieć minimum 4 znaki i maksimum 30 znaków");
        }
        return $status;
    }

    private function validateUserNickIncludeSpace (User $user): ValidationStatus
    {
        $status = new ValidationStatus();
        $status->setStatus(ValidationStatus::STATUS_SUCCESS);

        if (strpos($user->getNick(), ' ') !== false)
        {
            $status->setStatus(ValidationStatus::STATUS_ERROR);
            $status->setMessage("Nick nie może zawierać spacji");
        }
        return $status;
    }

    private function validateCorrectNickAndPassword(User $user): ValidationStatus
    {
        $status = new ValidationStatus();
        $status->setStatus(ValidationStatus::STATUS_SUCCESS);

        $correctLoginAndPassword = new UserRequests();
        if ($correctLoginAndPassword->correctLoginAndPassword($user) == false)
        {
            $status->setStatus(ValidationStatus::STATUS_ERROR);
            $status->setMessage("Zły login lub hasło");
        }
        return $status;
    }
}
