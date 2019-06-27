<?php
    $groupList = GroupManager::getList();
?>
<div class="verticalSpace2"></div>
<div class="Adminlist">
    <button class="link btn">
        <a href="<?php echo serverRoot ?>?action=createGroup">Créer un nouveau groupe</a>
    </button>
    <div class="verticalSpace"></div>
    <div class="list">
        <?php
        if($groupList != null)
        {
            echo '<table>';
            foreach($groupList as $oneGroup)
            {
                echo '<tr>';
                    echo '<td>' . $oneGroup->getDescription() . '</td>';

                    echo '<td class="horizontalSpace"></td>';

                    //affiche les boutons 'afficher', 'modifier' et 'supprimer'
                    /*
                        on passe la valeur de l'id du groupe que l'on veut afficher d'une page à l'autre grâce à 
                        "idgroup='. $oneGroup->getIdGroup().'"
                    */
                    echo '<td><a class="TaskActionButton" id="TaskEditButton" href="'. serverRoot .'?action=editGroup&idgroup='. $oneGroup->getIdGroup().'">Afficher</a></td>'; 
                    echo '<td><a class="TaskActionButton" id="TaskUpdateButton" href="'. serverRoot .'?action=updateGroup&idgroup='. $oneGroup->getIdGroup().'">Modifier</a></td>'; 
                    echo '<td><a class="TaskActionButton" id="TaskDeleteButton" href="'. serverRoot .'?action=deleteGroup&idgroup='. $oneGroup->getIdGroup().'">Supprimer</a></td>'; 
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
</div>
<div class="verticalSpace2"></div>
<div class="verticalSpace2"></div>
<div class="verticalSpace2"></div>
<div class="verticalSpace"></div>