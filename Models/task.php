<?php
require_once __DIR__ . '/../Database/database.php';

class task {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllByUser($id) {
        $query = "SELECT * FROM task where id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id_user' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createTask(){

    }
    public function updateTask(){

    }
    public function updateStatusTask($idTask,$status){
        $query = $this->conn->prepare('UPDATE task SET status = :status WHERE id = :id');
        $query->execute([
            'status' => $status,
            'id' => $idTask
        ]);
        }
    public function deleteTask(){

    }


   
}
?>
