<?php

require '../Model/TaskManager.class.php';
require '../Controller/Task.class.php';
require '../Model/Dbconnect.class.php';
require '../Controller/settings.class.php';

settings::init();
DbConnect::init();





switch ($_GET['function']) {
    case 'afficherGroupe':
    $db = Dbconnect::getDb();
        $q =$db->query('SELECT * FROM groupe');
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $taches[] = $donnees;
        }
        echo json_encode($taches);
        break;
    
    case 'afficherLesCategories':
    $db = Dbconnect::getDb();
        $q =$db->query('SELECT * FROM category');
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $category[] = $donnees;
        }
        echo json_encode($category);
        break;
    case'afficherLesUtilisateurs':
    $db = Dbconnect::getDb();
        $q =$db->query('SELECT * FROM user');
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $user[] = $donnees;
        }
        echo json_encode($user);
        break;
        case'afficherLesTaches':
        $db = Dbconnect::getDb();
        $q =$db->query('SELECT * FROM task');
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $taches[] = $donnees;
        }
        echo json_encode($taches);
            break;
    }




