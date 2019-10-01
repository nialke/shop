<?php


namespace src\Model\Validation;

use src\Model\Entities\Product;

class ProductValidation
{
    private $error;
    private $errorList;

    /**
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }

    /**
     * @param array $error
     */
    public function setError(string $error): void
    {
        $this->errorList[] = $error;
    }

    /**
     * @return array
     */
    public function getErrorList(): array
    {
        return $this->errorList;
    }

    /**
     * @param array $errorList
     */
    public function setErrorList(array $errorList): void
    {
        $this->errorList = $errorList;
    }

    private function validateIsElementEmpty($fieldName, $productValue, ValidationStatus &$status)
    {
        if (empty($productValue))
        {
            $status->setStatus(ValidationStatus::STATUS_ERROR);
            $status->setMessage("Pole $fieldName musi zostać uzupełnione");
        }
    }

    public function validateProduct(Product $product): ValidationStatus
    {
        $status = new ValidationStatus();
        $status->setStatus(ValidationStatus::STATUS_SUCCESS);

        $requireFields = [
            "marka" => $product->getBrand(),
            "model" => $product->getModel(),
            "kolor" => $product->getColor(),
            "cena" => $product->getPrice(),
            "ilość w magazynie" => $product->getAmount(),
            "obraz" => $product->getPicture(),
            "opis" => $product->getDescription(),
        ];

        foreach ($requireFields as $fieldName => $productValue) {
            $this->validateIsElementEmpty($fieldName, $productValue, $status);
        }
        return $status;
    }


}