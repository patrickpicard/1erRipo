<div class="verticalSpace"></div>
<form method="post" action="<?php echo serverRoot; ?>?action=register">
        <label for="name">Nom : </label>
        <input type="text" name="name" id="name">

        <label for="firstname">Prénom : </label>
        <input type="text" name="firstname" id="firstname">

        <label for="pseudo">Pseudo : </label>
        <input type="text" name="pseudo" id="pseudo">

        <label for="password">Mot de passe : </label>
        <input type="password" name="password" id="password">

        <label for="confirm">Confirmer le mot de passe : </label> 
        <input type="password" name="confirm" id="confirm" />
    <p>* Tous les champs sont obligatoires *</p>
    <div class="btns">
        <button class="btn" type="submit" value="S'inscrire">S'inscrire</button>        
        <button class="btn" type="reset" value="Annuler" onclick='location.href="Routes.php?action=connect"'>Annuler</button>
    </div>
</form>
<div class="verticalSpace"></div>
<div class="verticalSpace"></div>