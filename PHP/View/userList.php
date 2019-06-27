<?php
    $userList = UserManager::getList();
?>
<div class="verticalSpace2"></div>
<div class="Adminlist">
    <button class="link btn">
        <a href="<?php echo serverRoot ?>?action=createUser">Créer un nouvel utilisateur</a>
    </button>
    <div class="verticalSpace"></div>
    <div class="list">
        <?php
        if($userList != null)
        {
            echo '<table>';
            foreach($userList as $oneUser)
            {
                echo '<tr>';
                    echo '<td>' . $oneUser->getName() . '</td>';
                    echo '<td>' . $oneUser->getFirstname() . '</td>';
                    echo '<td>' . $oneUser->getPseudo() . '</td>';
                    echo '<td>' . $oneUser->getLevel() . '</td>';
                    echo '<td>' . $oneUser->getIdGroup() . '</td>';

                    echo '<td class="horizontalSpace"></td>';
                    
                    //affiche les boutons 'afficher', 'modifier' et 'supprimer'
                    /*
                        on passe la valeur de l'id de l'utilisateur que l'on veut afficher d'une page à l'autre grâce à "iduser='. $oneUser->getIdUser().'"
                    */
                    echo '<td><a class="TaskActionButton" id="TaskEditButton" href="'. serverRoot .'?action=editUser&iduser='. $oneUser->getIdUser().'">Afficher</a></td>'; 
                    echo '<td><a class="TaskActionButton" id="TaskUpdateButton" href="'. serverRoot .'?action=updateUser&iduser='. $oneUser->getIdUser().'">Modifier</a></td>'; 
                    echo '<td><a class="TaskActionButton" id="TaskDeleteButton" href="'. serverRoot .'?action=deleteUser&iduser='. $oneUser->getIdUser().'">Supprimer</a></td>'; 
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
</div>
<div class="verticalSpace2"></div>
<div class="verticalSpace2"></div>
<div class="verticalSpace"></div>