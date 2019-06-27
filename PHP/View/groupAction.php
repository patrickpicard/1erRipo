<?php
switch($_GET['action'])
{
    case "addGroup":
    {
        $group = new Groupe(["description"=>$_POST["groupName"]]);
        GroupManager::add($group);
        echo "Le groupe a bien été créé.";
        break;
    }
    case "delTask":
    {
        $task = new Groupe(["idgroup"=>$_POST["idgroup"], "description"=>$_POST["groupName"]]);
        GroupManager::delete($group);
        echo "Le groupe a bien été effacé.";
        break;
    }
    case "updTask":
    {
        $task = new Groupe(["idgroup" => $_POST["idgroup"], "description"=>$_POST["groupName"]]);
        GroupManager::update($group);
        echo "Le groupe a bien été modifié.";
        break;
    }
}

header("refresh:2;url=Routes.php?action=manageGroup");

?>