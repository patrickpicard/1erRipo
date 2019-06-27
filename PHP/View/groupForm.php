<?php

$groupList = GroupManager::getList();
$userList = UserManager::getList();

$action = $_GET['action'];

echo '<div class="verticalSpace"></div>';
echo '<div class="verticalSpace"></div>';
echo '<div class="contener">';
switch($action) 
{//on affiche l'en-tête du formulaire selon l'action désirée
    case "createGroup":
    {
        echo '<h1>Créer un groupe</h1>
        <form method="post" action="Routes.php?action=addGroup">';
        // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
        break;
    }
    case "deleteGroup":
    {
        echo '<h1>Supprimer un groupe</h1>
        <form method="post" action="Routes.php?action=delGroup">';
        break;
    }
    case "updateGroup":
    {
        echo '<h1>Modifier un groupe</h1>
        <form method="post" action="Routes.php?action=updGroup">';
        break;
    }
    case "editGroup": 
    {
        echo '<h1>Editer un groupe</h1>
        <form method="post">'; 
        break;
    }
}  

if(isset($_GET['idgroup'])) // Si $_GET['idgroup'] existe, on met toutes les infos du groupe en question dans la variable $group
{
    $group = GroupManager::getById($_GET['idgroup']);
}
?>

<!-- Pour chaque champ, si l'objet $group existe, on rempli les champs avec les valeurs de la tâche à afficher/modifier/supprimer-->
<input type="hidden" name="idgroup" value="<?php if(isset($group)) echo $group->getIdGroup(); ?>">  
<label for="groupName">Nom du groupe:</label><input type="text" name="groupName" id="groupName" value="<?php if(isset($group)) echo $group->getDescription(); ?>">

<div class="verticalSpace"></div>

<div class="grouplist">
    <label for="user">Sélectionnez les utilisateurs appartenant au groupe:</label>
    <div class="ulist">
    <?php
        foreach($userList as $uList)
        {
            echo '<div><input type="checkbox" name="user" id="user" value="' . $uList->getPseudo() . '"> ' . $uList->getPseudo() . '</div>'; //à modifier
        }
    ?>
    </div>
</div>
</form>
<?php
echo '<div class="btns">';
switch($action)
{//on affiche le bouton submit du formulaire selon l'action désirée
    case "createGroup":
    {
        echo '<button class="btn" type="submit" value="Créer">Créer</button>'; 
        break;
    }
    case "deleteGroup":
    {
        echo '<button class="btn" type="submit" value="Supprimer">Supprimer</button>';
        break;
    }
    case "updateGroup":
    {
        echo '<button class="btn" type="submit" value="Modifier">Modifier</button>';
        break;
    }
}
?>
    <button class="btn" type="reset" value="Annuler" onclick='location.href="Routes.php?action=manageGroup"'>Annuler</button>
</div>
</div>
<div class='verticalSpace2'></div>
<div class='verticalSpace'></div>