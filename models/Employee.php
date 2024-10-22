<?php
class Employee {
    private $pdo;

    public function __construct($pdo) 
    {
        $this->pdo = $pdo;
    }

    public function create($name, $surname, $email, $phone, $birthdate, $address, $salary) 
    {
        $stmt = $this->pdo->prepare('INSERT INTO employees (name, surname, email, phone, birthdate, address, salary) VALUES (?, ?, ?, ?, ?, ?, ?)');
        return $stmt->execute([$name, $surname, $email, $phone, $birthdate, $address, $salary]);
    }

    public function update($id, $name, $surname, $email, $phone, $birthdate, $address, $salary) 
    {
        $stmt = $this->pdo->prepare('UPDATE employees SET name = ?, surname = ?, email = ?, phone = ?, birthdate = ?, address = ?, salary = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?');
        return $stmt->execute([$name, $surname, $email, $phone, $birthdate, $address, $salary, $id]);
    }

    public function delete($id) 
    {
        $stmt = $this->pdo->prepare('DELETE FROM employees WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function getById($id) 
    {
        $stmt = $this->pdo->prepare('SELECT * FROM employees WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchEmployees($search, $limit, $offset) 
    {
        $stmt = $this->pdo->prepare('SELECT * FROM employees WHERE name LIKE ? OR surname LIKE ? OR email LIKE ? OR phone LIKE ? LIMIT ? OFFSET ?');
        $searchTerm = "%" . $search . "%";
        $stmt->bindParam(1, $searchTerm);
        $stmt->bindParam(2, $searchTerm);
        $stmt->bindParam(3, $searchTerm);
        $stmt->bindParam(4, $searchTerm);
        $stmt->bindParam(5, $limit, PDO::PARAM_INT);
        $stmt->bindParam(6, $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countEmployees($search) 
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) as total FROM employees WHERE name LIKE ? OR surname LIKE ? OR email LIKE ? OR phone LIKE ?');
        $searchTerm = "%" . $search . "%";
        $stmt->execute([$searchTerm, $searchTerm, $searchTerm, $searchTerm]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
?>
