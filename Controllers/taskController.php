<?php 
require_once "../Models/task.php";
class taskController {
    public $taskModel;

    public function __construct(){
        $this->taskModel = new task();
    }

    public function getAllTaskUser($idUser) {
        $task = $this->taskModel->getAllByUser($idUser);
        return $task;
    }
    public function createTask($idUser, $title, $description) {
        $task = $this->taskModel->createTask($idUser, $title, $description);
        return $task;
    }
    public function updateTask($idTask, $title, $description) {
        $task = $this->taskModel->updateTask($idTask, $title, $description);
        return $task;
    }
    public function deteleTask($taskId) {
        $task = $this->taskModel->deleteTask($taskId);
        return $task;
    }
    public function updateStatusTask($idTask,$status) {
        $task = $this->taskModel->updateStatusTask($idTask,$status);
        return $task;
    }
}

?>