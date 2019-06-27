<?php
$categoryList = CategoryManager::getList();
$groupList = GroupManager::getList();
$userList = UserManager::getList();

$action = $_GET['action'];

echo '<div class="contener">';
switch($action) 
{//on affiche l'en-tête du formulaire selon l'action désirée
    case "createTask":
    {
        echo '<h1>Créer une tâche</h1>
        <form method="post" action="Routes.php?action=addTask">';
        // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
        break;
    }
    case "deleteTask":
    {
        echo '<h1>Supprimer une tâche</h1>
        <form method="post" action="Routes.php?action=delTask">';
        break;
    }
    case "updateTask":
    {
        echo '<h1>Modifier une tâche</h1>
        <form method="post" action="Routes.php?action=updTask">';
        break;
    }
    case "editTask": 
    {
        echo '<h1>Editer une tâche</h1>
        <form method="post">';
        break;
    }
}  

if(isset($_GET['idtask'])) // Si $_GET['idtask'] existe, on met toutes les infos de la tache en question dans la variable $task
{
    $task = TaskManager::getById($_GET['idtask']);
}

?>

<!-- Pour chaque champ, si l'objet $task existe, on rempli les champs avec les valeurs de la tâche à afficher/modifier/supprimer-->
<input type="hidden" name="idtask" value="<?php if(isset($task)) echo $task->getIdTask(); ?>">  
    <select name="category">
        <option value="">Sélectionnez une catégorie</option>
            <?php
                foreach($categoryList as $catList)
                {
                    echo '<option value="' . $catList->getDescription() . '"> '. $catList->getDescription() . '  </option>';   
                }
            ?>
    </select>

    <label for="label">Libellé (25 caractères max): </label><input type="text" name="label" id="label" value="<?php if(isset($task)) echo $task->getDescription(); ?>" maxlength="25">

    <label for="date">Choisissez une date: </label><input type="date" name="date" id="date" value="<?php if(isset($task)) echo $task->getDate(); ?>"> 

<!-- fonctionne avec input mais pas avec textarea -->
    <label for="comment">Commentaire (250 caractères max): </label><input type="text" name="comment" id="comment" value="<?php if(isset($task)) echo $task->getComment(); ?>" maxlength="250"> 

    <select name="group">
        <option value="">Sélectionnez un groupe</option>
            <?php
                foreach($groupList as $grpList)
                {
                    echo '<option value="' . $grpList->getDescription() . '"> '. $grpList->getDescription() .' </option>';
                }
            ?>
    </select>     
    </form>
<?php
echo '<div class="btns">';
switch($action)
{//on affiche le bouton submit du formulaire selon l'action désirée
    case "createTask":
    {
        echo '<button class="btn" type="submit" value="Créer">Créer</button>'; 
        break;
    }
    case "deleteTask":
    {
        echo '<button class="btn" type="submit" value="Supprimer">Supprimer</button>';
        break;
    }
    case "updateTask":
    {
        echo '<button class="btn" type="submit" value="Modifier">Modifier</button>';
        break;
    }
} 
?>
    <button class="btn" type="reset" value="Annuler" onclick='location.href="Routes.php?action=mainUser"'>Annuler</button>
</div>
</div>
<div class='verticalSpace'></div>
<div class='verticalSpace'></div>
<div class='verticalSpace'></div>