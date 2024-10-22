<?php
include_once 'models/Employee.php';

class EmployeeController 
{
    private $employeeModel;
    public $errors = [];

    public function __construct($pdo) 
    {
        $this->employeeModel = new Employee($pdo);
    }

    public function createEmployee($name, $surname, $email, $phone, $birthdate, $address, $salary) 
    {
        $this->resetErrors();
        if ($this->validateEmployee($name, $surname, $email, $phone, $birthdate, $address, $salary)) {
            return $this->employeeModel->create($name, $surname, $email, $phone, $birthdate, $address, $salary);
        }
        return false;
    }

    public function updateEmployee($id, $name, $surname, $email, $phone, $birthdate, $address, $salary) 
    {
        $this->resetErrors();
        if ($this->validateEmployee($name, $surname, $email, $phone, $birthdate, $address, $salary)) {
            return $this->employeeModel->update($id, $name, $surname, $email, $phone, $birthdate, $address, $salary);
        }
        return false;
    }

    public function deleteEmployee($id) 
    {
        return $this->employeeModel->delete($id);
    }

    public function listEmployees($search = '', $limit = 10, $offset = 0) 
    {
        return $this->employeeModel->searchEmployees($search, $limit, $offset);
    }

    public function countEmployees($search = '') 
    {
        return $this->employeeModel->countEmployees($search);
    }

    public function getEmployeeById($id) 
    {
        return $this->employeeModel->getById($id);
    }

    private function resetErrors() 
    {
        $this->errors = [];
    }

    private function validateEmployee($name, $surname, $email, $phone, $birthdate, $address, $salary) 
    {
        if (empty($name) || empty($surname)) {
            $this->errors[] = "Nome e cognome sono obbligatori.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Formato email non valido.";
        }

        if (empty($birthdate)) {
            $this->errors[] = "La data di nascita è obbligatoria.";
        } elseif (!preg_match('/\d{4}-\d{2}-\d{2}/', $birthdate)) {
            $this->errors[] = "La data di nascita deve essere nel formato YYYY-MM-DD.";
        }

        if (!is_numeric($salary) || $salary < 0) {
            $this->errors[] = "Stipendio non valido.";
        }

        return empty($this->errors);
    }
}


?>
