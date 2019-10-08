<?php


namespace src\Model\Validation;


class OrderValidation
{
    public function validateFormData(): ValidationStatus
    {
        $status = new ValidationStatus();
        $status->setStatus(ValidationStatus::STATUS_SUCCESS);

        $parameters = [
            "imie i nazwisko" => $_POST['name_surname'],
            "ulica" => $_POST['street'],
            "nr domu" => $_POST['house'],
            "kod pocztowy" => $_POST['postcode'],
            "miasto" => $_POST['city'],
            "metoda dostawy" => $_POST['delivery_method']
        ];

        foreach ($parameters as $key => $parameter)
        {
            if (empty($parameter))
            {
                $status->setStatus(ValidationStatus::STATUS_ERROR);
                $status->setMessage("Pole $key nie zostało uzupełnione");
            }
        }

        return $status;
    }
}