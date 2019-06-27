<?php
switch($_GET['action'])
{
    case "addTask":
    {
        $task = new Task(["idcategory"=>$_POST["category"], "date"=>$_POST["date"], "description"=>$_POST["label"], "comment"=>$_POST["comment"], ["idgroup"]=>$_POST["group"], ["iduser"]=>$_POST["user"]]);
        TaskManager::add($task);
        echo "Votre tâche a bien été créée.";
        break;
    }
    case "delTask":
    {
        $task = new Task(["idtask"=>$_POST["idtask"], "idcategory"=>$_POST["category"], "date"=>$_POST["date"], "description"=>$_POST["label"], "comment"=>$_POST["comment"], ["idgroup"]=>$_POST["group"], ["iduser"]=>$_POST["user"]]);
        TaskManager::delete($task);
        echo "Votre tâche a bien été effacée.";
        break;
    }
    case "updTask":
    {
        $task = new Task(["idtask" => $_POST["idtask"], "idcategory"=>$_POST["category"], "date"=>$_POST["date"], "description"=>$_POST["label"], "comment"=>$_POST["comment"], ["idgroup"]=>$_POST["group"], ["iduser"]=>$_POST["user"]]);
        TaskManager::update($task);
        echo "Votre tâche a bien été modifiée.";
        break;
    }
}

header("refresh:2;url=Routes.php?action=mainUser");

?>