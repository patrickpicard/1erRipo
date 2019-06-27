<div class="verticalSpace"></div>
<div class="ConnectionTitle">
	<h4>Bienvenue dans votre espace de connexion, merci de renseigner les informations nécessaires</h4>
</div>
<div class="verticalSpace"></div>
<form  method="post" action="<?php echo serverRoot; ?>?action=connect">	
	<label for="pseudo">Nom d'utilisateur :</label>
	<input type="text" name="pseudo" id="pseudo">

	<label for="password">Mot de passe :</label>
	<input type="password" name="password" id="password">

	<!-- Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode "post" a été sélectionnée -->
	<div class="btns">
		<button class='btn' type="submit" value="Connexion">Connexion</button>	
	</div>
</form>

<div class="verticalSpace"></div>
<a href="<?php echo serverRoot; ?>?action=register">Pas encore inscrit ?</a>
<div class="verticalSpace2"></div>
<div class="verticalSpace2"></div>


