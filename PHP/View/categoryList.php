<?php
    $categoryList = CategoryManager::getList();
?>
<div class="verticalSpace2"></div>
<div class="verticalSpace"></div>
<div class="Adminlist">
    <button class="link btn">
        <a href="<?php echo serverRoot ?>?action=createCategory">Créer une nouvelle catégorie</a>
    </button>
    <div class="verticalSpace"></div>
    <div class="list">
        <?php
        if($categoryList != null)
        {
            echo '<table>';
            foreach($categoryList as $oneCategory)
            {
                echo '<tr>';
                    echo '<td>' . $oneCategory->getDescription() . '</td>';

                    echo '<td class="horizontalSpace"></td>';

                    //affiche les boutons 'afficher', 'modifier' et 'supprimer'
                    /* 
                        on passe la valeur de l'id de la categorie que l'on veut afficher d'une page à l'autre grâce à 
                        "idcategory='. $oneCategory->getIdCategory().'" 
                    */
                    echo '<td><a class="TaskActionButton" id="TaskEditButton" href="'. serverRoot .'?action=editCategory&idcategory='. $oneCategory->getIdCategory().'">Afficher</a></td>'; 
                    echo '<td><a class="TaskActionButton" id="TaskUpdateButton" href="'. serverRoot .'?action=updateCategory&idcategory='. $oneCategory->getIdCategory().'">Modifier</a></td>'; 
                    echo '<td><a class="TaskActionButton" id="TaskDeleteButton" href="'. serverRoot .'?action=deleteCategory&idcategory='. $oneCategory->getIdCategory().'">Supprimer</a></td>'; 
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