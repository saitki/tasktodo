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
    public function createTask() {
        $task = $this->taskModel->createTask();
        return $task;
    }
    public function updateTask() {
        $task = $this->taskModel->updateTask();
        return $task;
    }
    public function deteleTask() {
        $task = $this->taskModel->deleteTask();
        return $task;
    }
    public function updateStatusTask() {
        $task = $this->taskModel->updateStatusTask();
        return $task;
    }
}

?>