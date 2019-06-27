<?php
$titre = "Connexion";

if (!isset($_POST['pseudo'])) // Si la variable $_POST du pseudo est vide
{
    require adresseRoot.'/PHP/View/connect.php'; // On affiche la page de connexion
} 
else // Sinon, le formulaire a été validé
{ 
    $message = '';
    if (empty($_POST['pseudo']) || empty($_POST['password'])) // Si un champ à été oublié, on affiche un message d'erreur
    {
        echo '<div class="verticalSpace2"></div>';
        echo '<div class="verticalSpace"></div>';
        $message = '<p>Une erreur s\'est produite pendant votre identification.<br>
        Vous devez remplir tous les champs</p>';
        echo '<div>'.$message.'</div>'; 
        echo '<div class="verticalSpace2"></div>';
        echo '<div class="verticalSpace2"></div>';
        echo '<div class="verticalSpace2"></div>';
        header("refresh:3;url=Routes.php?action=connect");   
    } 
    else // Sinon, tous les champs ont été remplis, on vérifie donc le mot de passe
    {
        $user = UserManager::getByPseudo($_POST['pseudo']); // On recherche l'utilisateur dans la base de données et on rempli l'objet $user

        if ($user->getPassword() == md5($_POST['password'])) // Si le mot de passe enregistré dans la base de données correspond bien au mot de passe entré par l'utilisateur
        {
            $_SESSION['pseudo'] = $user->getPseudo();
            $_SESSION['level'] = $user->getLevel();
            $_SESSION['id'] = $user->getIdUser();
            $_SESSION['idgroup'] = $user->getIdGroup();
            $message = '<p>Bienvenue ' . $user->getPseudo() . ', vous êtes maintenant connecté!</p>';
            echo '<div>'.$message.'</div>'; 
            
            if ($_SESSION['level'] == 2) // si c'est un administrateur, on le redirige vers l'accueil Admin
            {
                header("refresh:3;url=Routes.php?action=mainAdmin");
            }
            else // sinon, c'est un utilisateur, on le redirige vers l'accueil utilisateur
            {
                header("refresh:3;url=Routes.php?action=mainUser");
            }
	    } 
		else // Si le mot de passe entré par l'utilisateur ne correspond pas à celui de la base de données, on affiche un message d'erreur
        {
            echo '<div class="verticalSpace2"></div>';
            echo '<div class="verticalSpace"></div>';
            $message = '<p>Une erreur s\'est produite pendant votre identification.<br /> Le mot de passe ou le pseudo
            entré n\'est pas correct.</p>';
            echo '<div>'.$message.'</div>'; 
            echo '<div class="verticalSpace2"></div>';
            echo '<div class="verticalSpace2"></div>';
            echo '<div class="verticalSpace2"></div>';
            header("refresh:3;url=Routes.php?action=connect");
        }
    }
}

?>

