<?php
class Parametres
{
	private static $adresseRoot;
    private static $serverRoot;
    private static $host;
    private static $port;
    private static $dbname;
    private static $login;
    private static $password;
	
	public static function getAdresseRoot()
    {
        return self::$adresseRoot;
    }
	
	public static function getServerRoot()
    {
        return self::$serverRoot;
    }
	
	public static function getHost()
    {
        return self::$host;
    }
	
	public static function getPort()
    {
        return self::$port;
    }
	
	public static function getDbname()
    {
        return self::$dbname;
    }
	
	public static function getLogin()
    {
        return self::$login;
    }
	
	public static function getPassword()
    {
        return self::$password;
    }
	
	public static function init()
	{
		//on récupère les paramètres de connexion de la base de données:
		if(file_exists("parametres.ini"))//si "parametres.ini" existe dans le dossier dans lequel on se trouve (Controller)
		{
			$fic="parametres.ini";
		}
		else // sinon "parametres.ini" se trouve dans le dossier AgendaFinal
		{
			$fic="../../parametres.ini"; 
		}
		
		//ouverture du fichier en lecture seule:
		$fp = fopen($fic, "r"); //fopen sert à ouvrir un fichier. Ici on ouvre le fichier "parametres.ini" (contenu dans $fic) en lecture seule
		
		//boucle jusqu'à la fin du fichier:
		while (!feof($fp)) //feof teste la fin du fichier "parametres.ini". Tant que le fichier n'est pas terminé
		{//lecture d'une ligne, le contenu sera stocké dans un tableau ($param)
			$ligne = fgets($fp, 4096); // fgets récupère la ligne courante sur laquelle se trouve le pointeur du fichier. 
			if($ligne) //Si $ligne = true. Si la ligne est vide, alors $ligne = false. Cela évite de planter si il y a des passages à la lignes en fin de fichier
            {
                //on garde la partie utile (c'est a dire le paramètre)
				$info = explode(":", $ligne); // explode coupe une chaîne de caractères en segments. Ici, on enlève tout ce qui se trouve devant ":" contenu dans $ligne
								//on enlève le caractère espace à la fin
								$param[] = substr($info[1], 0, strlen($info[1]) - 2); //substr retourne un segment de chaîne. strlen calcule la taille d'une chaîne.
						 /* 
							 '$info[1]' est le string à partir duquel on retournera un segment de chaine. 
							 '0' détermine où commencer le segment. 
							 'strlen($info[1])-2)'correspond à la taille du string à retourner  
						 */
			} 
		}
	
		self::$serverRoot = $param[0];
        self::$adresseRoot = $param[1];
        self::$host = $param[2];
        self::$port = $param[3];
        self::$dbname = $param[4];
        self::$login = $param[5];
        self::$password = $param[6];
    }
}

			