<?php

class GroupManager
{
	static public function add(Groupe $group)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Préparation de la requête d'insertion.
		$q = $db->prepare('INSERT INTO groupe (description) VALUES(:description)');
		
		// Assignation des valeurs pour la categorie
		$q->bindValue(':description', $group->getDescription());
		
		// Exécution de la requête.
		$q->execute();
		
	}
	
	static public function delete(Groupe $group)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Exécute une requête de type DELETE.
		$db->exec('DELETE FROM groupe WHERE idgroup = '.$group->getIdGroup());
	}
	
	static public function getById($id)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Groupe.
		$id = (int) $id;
		
		$q = $db->query('SELECT idgroup, description FROM groupe WHERE idgroup = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new Groupe($donnees);
	}
	
	static public function update(Groupe $group)
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Prépare une requête de type UPDATE.
		$q = $db->prepare('UPDATE groupe SET description=:description  WHERE idgroup = :idgroup');
		
		// Assignation des valeurs à la requête.
		$q->bindValue(':idgroup', $group->getIdGroup());
		$q->bindValue(':description', $group->getDescription());
		// Exécution de la requête.
		$res = $q->execute();
	}
	
	static public function getList()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les groupes.
		
		$q = $db->query('SELECT idgroup, description FROM groupe ORDER BY idgroup');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$groups[] = new Groupe($donnees);
		}
		return $groups; 
	}

	static public function getListUsers()
	{
		$db = DbConnect::getDb(); // Instance de PDO.
		// Retourne la liste de tous les utilisateurs d'un groupe.
		
		$q = $db->query('SELECT name, firstname, description FROM user ORDER BY name');
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$groups[] = new Groupe($donnees);
		}
		return $groups;
	}
}